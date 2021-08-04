<?php
include("bootstrap/init.php");

$orderId = $_SESSION["order_id"];


if ($_GET || $_POST) {
    diePage("اطلاعات ناقص");
}

$data = array(
    "merchant_id" => "c1ab3bbc-ba67-407d-be62-22889c6607df",
    "amount" => getOrderPrice($orderId),
    "callback_url" => BASE_URL . "verify.php",
    "description" => "خرید یوسی",
    "metadata" => [],
);
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
$err = curl_error($ch);
$result = json_decode($result, true, JSON_PRETTY_PRINT);
curl_close($ch);



if ($err) {
    diePage( "cURL Error #:" . $err);
} else {
    if (empty($result['errors'])) {
        if ($result['data']['code'] == 100) {


            if (addAuthority($orderId, $result['data']["authority"])) {
                header('Location: https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
            } else {
                diePage(".در ارتباط با درگاه مشکلی پیش آمده لطفا بعدا تلاش کنید", "error");
            }
        }
    } else {
        header('Location: ' . BASE_URL);

        echo 'Error Code: ' . $result['errors']['code'];
        echo 'message: ' .  $result['errors']['message'];
    }
}
