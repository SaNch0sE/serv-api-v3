<?php
require_once "services/models/validate.php";
require_once "services/models/GetTasks.php";
require_once "services/models/GetUId.php";
class App {
    static function action($route, $data)
    {
        switch ($route) {
            case 'login':
                require_once 'services/login.php';
                return login($data);
            case 'register':
                require_once 'services/register.php';
                return register($data);
            case 'getItems':
                require_once 'services/getItems.php';
                return getItems($data);
            case 'addItem':
                require_once 'services/addItem.php';
                return addItem($data);
            case 'changeItem':
                require_once 'services/changeItem.php';
                return changeItem($data);
            case 'deleteItem':
                require_once 'services/deleteItem.php';
                return deleteItem();
            case 'logout':
                require_once 'services/logout.php';
                return logout($data);
            default:
                return json_encode(array('error' => 'Invalid action'));
        }
    }
}