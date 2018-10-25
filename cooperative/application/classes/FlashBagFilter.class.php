<?php


class FlashBagFilter implements InterceptingFilter {
    function run(Http $http, array $queryFields, array $formFields) {
        return [
            'flashBag' => new FlashBag()
        ];
    }
}