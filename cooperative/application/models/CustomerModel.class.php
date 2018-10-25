<?php

class CustomerModel {

    public $id;
    public $firstName;
    public $lastName;

    function createAdress($customer_id, $addressLine1, $addressLine2, $city, $zipCode, $phoneNumber) {
        $db = new Database();
        $sql = "UPDATE customers 
                SET addressLine1 = ?, addressLine2 = ?, city = ?, zipCode = ?, phoneNumber  = ?
                WHERE id = ?";

        $db->executeSql($sql, [$addressLine1, $addressLine2, $city, $zipCode, $phoneNumber, $customer_id]);
    }

    function getCustomer($customer_id) {
        $sql = "SELECT title, id, city, addressLine1, addressLine2, lastName, firstName, zipCode, email, birthDate, phoneNumber
                FROM customers WHERE id = ? ";
        $db = new Database();
        return $db->queryOne($sql, [$customer_id]);
    }

    function getAddress($customer_id) {
        $sql = "SELECT addressLine1, addressLine2, city, zipCode, phoneNumber
                FROM customers WHERE id = ? ";
        $db = new Database();
        return $db->queryOne($sql, [$customer_id]);
    }

    function create($firstName, $lastName, $email, $password, $birthdate) {
        $db = new Database();

        // on vérifie l'email dans la base de données
        $sql = "SELECT email FROM customers WHERE email = ? ";
        $user_exist = $db->queryOne($sql, [$email]);

        // on sait dont si le compte existe déjà ou non
        if ($user_exist)
            throw new DomainException("un compte avec l'email $email existe déjà");

        // insertion dans la base de données
        $sql = "INSERT INTO customers (firstName, lastName, email, password, birthDate, registerDate)
                VALUES (?, ?, ?, ?, ?, NOW())";

        // génération du hash aléatoire avant de stocker
        $password = $this->hashPassword($password);

        // la méthode "executeSQL" me retourne l'id de la dernière liste insérée (lastInsertID)
        $this->id = $db->executeSql($sql, [$firstName, $lastName, $email, $password, $birthdate]);
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        // mise à jour de l'heure de connexion
        $this->updateLastLogin($this->id);

        return $this->id;

    }

    private function hashPassword($password) {
        /*
         * Génération du sel, nécessite l'extension PHP OpenSSL pour fonctionner.
         *
         * openssl_random_pseudo_bytes() va renvoyer n'importe quel type de caractères.
         * Or le chiffrement en blowfish nécessite un sel avec uniquement les caractères
         * a-z, A-Z ou 0-9.
         *
         * On utilise donc bin2hex() pour convertir en une chaîne hexadécimale le résultat,
         * qu'on tronque ensuite à 22 caractères pour être sûr d'obtenir la taille
         * nécessaire pour construire le sel du chiffrement en blowfish.
         */
        $salt = '$2y$11$' . substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

        // Voir la documentation de crypt() : http://devdocs.io/php/function.crypt
        return crypt($password, $salt);
    }

    public function updateLastLogin($id) {
        $db = new Database();
        $sql = "UPDATE customers SET lastLoginDate = NOW() WHERE id = ?";
        $db->executeSql($sql, [$id]);
    }

    function login($email, $password) {

        // récupération des infos du client
        $db = new Database();
        $customer = $db->queryOne('SELECT id, firstName, lastName, password FROM customers WHERE email = ?', [$email]);

        // varifier que le mail existe
        if (!$customer)
            return false;

        $this->id = $customer['id'];
        $this->firstName = $customer['firstName'];
        $this->lastName = $customer['lastName'];

        // si le mot de passe est bon on met à jour l'heure de login
        if ($this->checkPassword($password, $customer['password'])) {
            $this->updateLastLogin($this->id);
            return true;
        }
        return false;
    }

    private function checkPassword($password, $salt) {
        // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
        return crypt($password, $salt) == $salt;
    }

}