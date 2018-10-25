<?php


class RegisterController {
    function httpGetMethod(Http $http) {
        $userSession = new UserSession();
        if ($userSession->isLogged()) {
            $http->redirectTo('/');
        }

        return [
            '_form' => new RegisterForm()
        ];
    }

    function httpPostMethod(Http $http, array $formFields) {

        if (array_key_exists('register_user', $formFields)) {

            $firstName = trim($formFields['firstName']);
            $lastName = trim($formFields['lastName']);
            $email = strtolower(trim($formFields['email']));
            $password = trim($formFields['password']);
            $birthDate = $formFields['year'] . '-' . $formFields['month'] . '-' . $formFields['day'];

            try {
                if (empty($firstName) or empty($lastName) or empty($email) or empty($password))
                    throw new DomainException('tous les champs doivent être remplis');

                // création d'un client dans la base de données
                $customerModel = new CustomerModel();
                $customerID = $customerModel->create($firstName, $lastName, $email, $password, $birthDate);

                // création de la session (connexion de l'utilisateur)
                $userSession = new UserSession();
                $userSession->create($customerID, $firstName, $lastName);

                $flashBag = new FlashBag();
                $flashBag->add("Bienvenue " . $userSession->getFullName() . ". Vous êtes bien inscrit sur le super site");

                $http->redirectTo('/');


            } catch (DomainException $error) {
                // gestion du message d'erreur
                $flashBag = new FlashBag();
                $flashBag->add($error->getMessage());
            }

            // auto remplissage des champs du formulaire
            $form = new RegisterForm();
            $form->bind($formFields);

            return [
                '_form' => $form
            ];
        }
    }
}