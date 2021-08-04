<?php
include "bootstrap/init.php";
// diePage("خارج از سرویس");
$products = getProducts();
if ($products && count($products) > 0) {
    include "tpl/index.php";
}else{
    diePage("دسترسی وجود ندارد");
}
