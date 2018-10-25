<?php


class UserSessionFilter implements InterceptingFilter {
    function run(Http $http, array $queryFields, array $formFields) {
        return [
            'userSession' => new UserSession()
        ];
    }
}
