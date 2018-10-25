<?php


class AboutModel {

	function getAuthor() {
		$db = new Database();
		return $db->query("SELECT id, contents, firstname, title, pictureUrl FROM author ORDER BY firstname" );
	}
		function getHistory() {
		$db = new Database();
		return $db->query("
		SELECT post.id,title, contents
		FROM post 
		INNER JOIN category ON post.category_id = category.id
		WHERE category_id = 1 
		ORDER BY title ");

	}
		function getPost() {
		$db = new Database();
		return $db->query("
		SELECT post.id,title, contents, pictureUrl
		FROM post 
		INNER JOIN category ON post.category_id = category.id
		WHERE category_id = 2 
		ORDER BY title ");

	}

}