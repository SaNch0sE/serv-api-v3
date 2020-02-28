<?php
function changeItem($data)
{
    $uid = getUserId();
	if (strlen($uid) > 0) {
        $tasks = GetTasks($uid);
		validate("changeItem", $data);
		$id = $data['id'];
		$checked = $data['checked'];
		$text = $data['text'];
		$output['ok'] = false;
		$i = 0;
		foreach ($tasks as $key => $value) {
			if ($value['id'] === intval($id)) {
				$tasks[$i] = ['id' => intval($id), 'text' => $text, 'checked' => filter_var($checked, FILTER_VALIDATE_BOOLEAN)];
				$output['ok'] = true;
				break;
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