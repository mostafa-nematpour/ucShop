<?php
include "bootstrap/init.php";
if (isset($_SESSION["pl"])) {
    $result = $_SESSION["pl"];
} else {
    header('Location: ' . BASE_URL);
}

include "tpl/tpl_result.php";
