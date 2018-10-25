<?php

class HistoryController {
	function httpGetMethod(Http $http, array $queryFields) {

		$aboutModel = new AboutModel();

		return [
			'articles' => $aboutModel->getHistory(),
			'posts' => $aboutModel->getPost(),
			'authors' => $aboutModel->getAuthor()
		];

	}
}