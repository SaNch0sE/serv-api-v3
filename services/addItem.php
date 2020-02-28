<?php
function addItem($data) {
    $uid = getUserId();
    if (strlen($uid) > 0) {
        $tasks = GetTasks($uid);
        if (is_array($tasks)) {
            $id = end($tasks)['id']+1;
        } else {
            $id = 0;
        }
        validate("addItem", $data);
        $text = $data['text'];
        $tasks[$id] = ['id' => $id, 'text' => $text, 'checked' => false];
        $tasks = array_values($tasks);
        file_put_contents($uid.'.json', json_encode($tasks));
        echo json_encode(['id' => $id]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => "Error when processing user id"));
    }
}
