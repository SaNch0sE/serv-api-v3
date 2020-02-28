<?php
function getItems($data)
{
    $uid = getUserId();
	if (strlen($uid) > 0) {
		$tasks = GetTasks($uid);
		if ($tasks != null) {
			$data['items'] = $tasks;
		} else {
			$data['items'] = [];
		}
		echo json_encode($data);
	} else {
		header('Content-Type: application/json');
		echo json_encode(array('error' => "Error when processing user id"));
	}
}