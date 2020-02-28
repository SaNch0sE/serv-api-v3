<?php
	function getUserId()
	{
		$users = json_decode(file_get_contents('users.json'), true);
		if (!isset($_COOKIE['user-key'])) {
			return false;
		}
		foreach ($users as $key => $value) {
			if ($value['user-key'] === $_COOKIE['user-key']) {
				return $value['id'];
			}
		}
		return false;
	}