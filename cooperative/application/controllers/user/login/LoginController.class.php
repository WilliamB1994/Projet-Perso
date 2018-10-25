<?php

class LoginController {
    function httpGetMethod(Http $http) {
        $userSession = new UserSession();
        if ($userSession->isLogged()) {
            $http->redirectTo('/');
        }
    }

    function httpPostMethod(Http $http, $formFields) {

        // on réceptionne le formulaire de login
        if (array_key_exists('login', $formFields)) {

            // récupération des données du formulaire
            $email = strtolower(trim($formFields['email']));
            $password = trim($formFields['password']);

            $customerModel = new CustomerModel();

            // vérification du mot de passe utilisateur
            if ($customerModel->login($email, $password)) {

                // si le mot de passe est bon, on crée une session
                $userSession = new UserSession();
                $userSession->create(
                    $customerModel->id,
                    $customerModel->firstName,
                    $customerModel->lastName
                );

                $flashBag = new FlashBag();
                $flashBag->add('Content de te revoir ' . $userSession->getFullName());

                // redirection vers la page d'accueil
                $http->redirectTo('/');

            } else {
                echo "raté, essai encore !";
            }
        }
    }
}