<?php
require_once "services/errors/err-handler.php";
require_once "server.php";

$data = json_decode(file_get_contents('php://input'), true);
$route = htmlspecialchars($_GET['action']);
App::action($route, $data);