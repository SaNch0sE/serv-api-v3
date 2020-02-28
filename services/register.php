<?php
function register($data)
{
    $output['ok'] = true;
	validate("register", $data);
	if (isset($users[0]['id'])) {
		foreach ($users as $arr => $subArr) {
			if ($subArr['login'] === $data['login']) {
				$output['ok'] = false;
				break;
			}
		}
		if ($output['ok']) {
			$data['id'] = end($users)['id']+1;
			$data['user-key'] = null;
			$users[$data['id']] = $data;
			file_put_contents('users.json', json_encode($users));
		}
	} else {
		$data['id'] = 0;
		$data['user-key'] = null;
		$users[0] = $data;
		file_put_contents('users.json', json_encode($users));
	}
	echo json_encode($output);
}