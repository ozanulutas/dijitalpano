<?php
session_start();

require_once 'src/config.php';

DatabaseConnection::connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);


$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

$module = ucfirst($section) . 'Controller';

if(file_exists('controller/' . $module . '.php')) {

    include 'controller/' . $module . '.php';
    $controller = new $module();
    $controller->runAction($action);

}

