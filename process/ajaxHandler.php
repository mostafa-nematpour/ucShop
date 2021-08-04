<?php
include_once "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request", "Access denied");
}
if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action", "Access denied");
}
switch ($_POST['action']) {
    case 'checkproduct':

        if (!isset($_POST['id']) || !isset($_POST['email']) || !isset($_POST['uc'])) {
            // var_dump($_POST);
            echo '{ "response" : false , "text" : "apiError" }';
            die();
        }
        echo checkProduct($_POST);
        break;

    case 'checkport':
        

        break;
    default:
        echo "{r: Error}";
}
