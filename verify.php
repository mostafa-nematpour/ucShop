<?php
include("bootstrap/init.php");
if ($_GET == null || $_POST) {
    diePage("دسترسی ندارید");
}

$orderId = $_SESSION["order_id"];

$Authority = $_GET['Authority'];
$data = array("merchant_id" => "c1ab3bbc-ba67-407d-be62-22889c6607df", "authority" => $Authority, "amount" => getOrderPrice($orderId));
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
$result = json_decode($result, true, JSON_PRETTY_PRINT);


if ($err) {

    header('Location: ' . BASE_URL);
    echo "cURL Error #:" . $err;
} else {

    if (array_key_exists("code", $result['data']) && $result['data']['code'] == 100) {

        echo 'Transation success. RefID:' . $result['data']['ref_id'];

        if (addPaidList($result, $orderId)) {
            header('Location: ' . BASE_URL . 'result.php');
            try {
                sendMail($result, $orderId);
            } catch (Exception $e) {
            }
        } else {
            $resultJson = json_encode($result);
            $r = json_decode($resultJson);
            echo "مشکلی در ثبت سفارش شما پیش آمده حتما به پشتیبانی پیام دهید";
            print $result['data']['ref_id'];
            print $result;
            echo "code: ";
        }
    } else {

        switch ($result['errors']['code']) {
            case '-51':
                header('Location: ' . BASE_URL . 'preview.php?id=' . $orderId);
                break;
            default:
                header('Location: ' . BASE_URL);
        }
    }
}
