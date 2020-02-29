<?php
function logout()
{
    $output['ok'] = false;
	$users = json_decode(file_get_contents('users.json'), true);
	$i = 0;
	foreach ($users as $arr => $subArr) {
		if ($_COOKIE['user-key'] === $subArr['user-key']) {
			$users[$i]['user-key'] = null;
			$output['ok'] = true;
			header("Set-Cookie: user-key=''; path=/; domain=aboyko.shpp.me; HttpOnly");
			file_put_contents('users.json', json_encode($users));
		}
		$i += 1;
	}
	echo json_encode($output);
}