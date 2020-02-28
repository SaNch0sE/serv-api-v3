<?php
function deleteItem($data)
{
    $output['ok'] = false;
	$i = 0;
	validate("deleteItem", $data);
	$id = $data['id'];
	$uid = getUserId();
	if (strlen($uid) > 0) {
        $tasks = GetTasks($uid);
		foreach ($tasks as $key => $subArr) {
			if ($subArr['id'] === intval($id)) {
				unset($tasks[$i]);
				$output['ok'] = true;
			}
			$i += 1;
		}
		$tasks = array_values($tasks);
		file_put_contents($uid.'.json', json_encode($tasks));
		echo json_encode($output);
	} else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => "Error when processing user id"));
	}
}