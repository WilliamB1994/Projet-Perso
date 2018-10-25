<?php


class LogoutController {
    function httpGetMethod(Http $http) {

        $_SESSION = [];
        session_destroy();

        $http->redirectTo('user/login');

        $flashBag = new FlashBag();
        $flashBag->add('Vous avez été déconnecté.');

    }
}