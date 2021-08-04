<?php
include "bootstrap/init.php";
if (!isLoggedIn()) {
    //redirect
    header("Location: " . site_url('auth.php'));
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $paid = getPaid($id);
    if (isset($_GET['state'])) {
        if ($_GET['state'] == "paid") {
            if (unPaidToPaid($id)) {
                header("Location: " . site_url('admin.php'));
                $unPaidToPaid = true;
            }else{

            }
        }elseif($_GET['state'] == "unpaid"){
            if (PaidToUnPaid($id)) {
                header("Location: " . site_url('admin.php'));
                $PaidTounPaid = true;
            }else{

            }
        }
    }
}
$list = getPaidList();
$lastList = getLastPaidList();


include "tpl/tpl_admin.php";
