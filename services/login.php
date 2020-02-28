<?php
function login($data)
{
    validate("login", $data);
	$output['ok'] = false;
	$users = json_decode(file_get_contents('users.json'), true);
	$i = 0;
	foreach ($users as $arr => $subArr) {
		if ($subArr['login'] === $data['login'] && $subArr['pass'] === $data['pass']) {
			$users[$i]['user-key'] = md5($subArr['login'].$subArr['id']);
			file_put_contents('users.json', json_encode($users));
			header("Set-Cookie: user-key=".$users[$i]['user-key']."; path=/; domain=aboyko.shpp.me; HttpOnly");
			$output['ok'] = true;
		}
		$i += 1;
	}
	echo json_encode($output);
}