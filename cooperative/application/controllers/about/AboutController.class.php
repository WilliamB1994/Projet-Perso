<?php

class AboutController {
    function httpGetMethod(Http $http, array $queryFields) {

        $aboutModel = new AboutModel();

        return [
            'authors' => $aboutModel->getAuthor()
        ];
    }
}