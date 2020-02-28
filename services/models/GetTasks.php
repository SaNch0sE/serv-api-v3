<?php
    function GetTasks($uid)
    {
        $filename = $uid.'.json';
        if (file_exists($filename)) {
            return json_decode(file_get_contents($filename), true);
        } else {
            file_put_contents($filename, "");
            return json_decode(file_get_contents($filename), true);
        }
        $res = json_decode(array('error' => 'Error when getting tasks, please ask system administrator.'));
        echo $res;
        return;
    }