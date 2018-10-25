<?php

class AddressController {
    function httpGetMethod(Http $http) {
        $userSession = new UserSession();
        if (!$userSession->isLogged())
            $http->redirectTo('user/login');

        // récupération de l'adresse utilisateur dans la base
        $customerModel = new CustomerModel();
        $customer_id = $userSession->getId();
        $customer_address = $customerModel->getCustomer($customer_id);

        // pré-remplissage de l'adresse
        $form = new AddressForm();
        $form->bind($customer_address);

        return [
            '_form' => $form
        ];
    }

    function httpPostMethod(Http $http, $formFields) {

        if (array_key_exists('add_address', $formFields)) {

            // récupération des champs
            $addressLine1 = $formFields['addressLine1'];
            $addressLine2 = $formFields['addressLine2'];
            $city = $formFields['city'];
            $zipCode = intval($formFields['zipCode']);
            $phoneNumber = intval($formFields['phone']);

            // tous les champs doivent être rempli
            if (empty($addressLine1) OR empty($city) OR empty($zipCode) OR empty($phoneNumber)) {
                // gestion du message d'erreur
                $flashBag = new FlashBag();
                $flashBag->add('vous devez remplir tous les champs');

                // gestion des champs de formulaire (pour éviter d'avoir à les remplir à nouveau)
                $form = new AddressForm();
                $form->bind($formFields);

                return [
                    '_form' => $form
                ];
            }

            // récupération de l'id du client
            $userSession = new UserSession();
            $customer_id = $userSession->getId();

            // mise à jour de l'adresse
            $customerModel = new CustomerModel();
            $customerModel->createAdress($customer_id, $addressLine1, $addressLine2, $city, $zipCode, $phoneNumber);

            // si tout va bien on redirige vers la page suivante
            $http->redirectTo('cart/paiement');
        }
    }
}