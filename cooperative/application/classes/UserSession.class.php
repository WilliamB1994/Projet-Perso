<?php

class UserSession {

    // pareil que function UserSession(){}}
    function __construct() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    function create($customer_id, $firstName, $lastName) {
        $_SESSION = [
            'cart' => [],
            'firstName' => $firstName,
            'lastName' => $lastName,
            'isLogged' => true,
            'id' => $customer_id
        ];
    }

    function destroy() {
        $_SESSION = [];
        session_destroy();
    }

    function isLogged() {
        return array_key_exists('isLogged', $_SESSION) && $_SESSION['isLogged'] == true;
    }

    function saveCart(array $cart) {
        $_SESSION['cart'] = $cart;
    }

    /*********************************************************************************************
     *
     *                                            GETTERS
     *
     *********************************************************************************************/
    function getId() {
        return $_SESSION['id'];
    }

    function getFullName() {
        return $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
    }

    function getCart() {
        return $_SESSION['cart'];
    }
}



