<?php
include "bootstrap/init.php";
$alert = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            echo "Incorrest";
        } else {
            var_dump("you are login");
            header("Location: " . site_url()."admin.php");
        }
    }
    //var_dump($result);
}

include "tpl/tpl-auth.php";
