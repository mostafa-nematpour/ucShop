<?php
include "bootstrap/init.php";
$id = $_GET['id'];
$order = getOrder($id);
$price = getOrderPrice($id);
if ($order == null || $order->state == "closed" || $price == null) {
    header("Location: " . site_url());
}
$_SESSION["order_id"] = $id;

include "tpl/tpl_preview.php";
