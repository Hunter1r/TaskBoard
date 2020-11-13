<?php
//Контроллер главной страницы
include_once "autoload.php";


$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';



if (isset($_GET['c'])) {
    if ($_GET['c'] == 'page') {
        $controller = new C_index();
    } else if ($_GET['c'] == 'user') {
        $controller = new C_User();
    }
} else if (isset($_POST['login']) && isset($_POST['pass'])) {
    $controller = new C_User();
    $action = 'action_login';
} else if(isset($_POST['task'])){
    $controller = new C_index();
    $action = 'action_newTask';

} else {
    $controller = new C_index();
}
$controller->Request($action);