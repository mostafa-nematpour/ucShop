<?php


/**
 * 
 * To receive a list of product
 * 
 * return --> PDO::FETCH_OBJ
 * 
 */
function getProducts()
{
    global $PDO;
    try {
        $sql = "select * from products";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        diePage($e->getMessage(), "get products Faile");
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

/**
 * 
 * To check purchase request information (It actually does nothing)
 * p --> _POST
 * return --> addOrder()
 * 
 */
function checkProduct($p)
{
    $order = array(
        "product" => $p["uc"],
        "userid" => $p["id"],
        "username" => $p["uName"],
        "name" => $p["name"],
        "email" => $p["email"],
        "number" => $p["tel"],
        "description" => $p["dec"]
    );
    return addOrder($order);
}

/**
 * 
 * To Add order in database
 * o --> array
 * return --> json
 * 
 */
function addOrder($o)
{
    global $PDO;
    try {
        $sql = "INSERT INTO `orders` (`product`, `userid`, `username`, `name`, `email`, `number`, `description`) VALUES ( :product,  :userid, :username, :name, :email, :number, :description);";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':product' => $o['product'], ':userid' => $o['userid'], ':username' => $o['username'], ':name' => $o['name'], ':email' => $o['email'], ':number' => $o['number'], ':description' => $o['description']]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "add order Faile");
    }

    return '{"response":' . $stmt->rowCount() . ',"id":"' . $PDO->lastInsertId() . '"}';
}

/**
 * 
 * To receive a special order
 * id --> orders id
 * return --> PDO::FETCH_OBJ or null
 * 
 */
function getOrder($id)
{

    global $PDO;
    try {
        $sql = "select * from orders where id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        return null;
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

/**
 * 
 * The payment operations booklet creates a temporary list
 * id --> orders id
 * authority --> code
 * return --> true or false
 * 
 */
function addAuthority($id, $authority)
{
    global $PDO;
    try {
        $sql = "INSERT INTO `paymentlist` (`order_id`, `authority`) VALUES (:order_id, :authority);";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':order_id' => $id, ':authority' => $authority]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "add order Faile");
    }
    return $stmt->rowCount() == 1 ? true : false;
}


/**
 * 
 * To get the price of the product
 * id --> Product id
 * return --> price or null
 * 
 */
function getUcPrice($id)
{
    $product = getProduct($id);
    if ($product != null) {
        return $product->price;
    }
    return null;
}

/**
 * 
 * To get value of product
 * id --> Product id
 * return --> value or null
 * 
 */
function getUcvalue($id)
{
    $product = getProduct($id);
    if ($product != null) {
        return $product->value;
    }
    return null;
}

/**
 * 
 * To calculate the price
 * id --> order id
 * return --> getUcPrice() or null
 * 
 */
function getOrderPrice($oId)
{
    $order = getOrder($oId);
    if ($order != null) {
        return getUcPrice($order->product);
    }
    return null;
}

/**
 * 
 * To receive a product
 * id --> product id
 * return --> PDO::FETCH_OBJ or null
 * 
 */
function getProduct($id)
{
    global $PDO;
    try {
        $sql = "select * from products where id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        return null;
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}



function addPaidList($result, $id)
{
    return addPaid($result, $id);
}


/**
 * 
 * The main function is to save the paid invoice
 * id --> order id
 * result --> zarinpal result
 * return --> true(good) or false(bad)
 * 
 */

function addPaid($result, $id)
{
    try {
        global $PDO;
        $s = [
            "result" => false,
            "orderId" => $id,
            "zResult" => $result,
            "plId" => 0
        ];
        $order = getOrder($id);

        if ($order == null) {
            return false;
        }

        $resultJson = json_encode($result);
        $product = getProduct($order->product);
        $PDO->beginTransaction();

        try {

            $sql = "INSERT INTO `paidlist` (`uc`, `userid`, `username`, `data`, `name`, `email`, `number`, `description`) VALUES (:uc, :userid, :username , :data, :name, :email, :number, :description);";
            $stmt = $PDO->prepare($sql);
            $stmt->execute([':uc' => $product->value, ':userid' => $order->userid, ':username' => $order->username, ':data' => $resultJson, ':name' => $order->name, ':email' => $order->email, ':number' => '+' . $order->number, ':description' => $order->description]);
        } catch (Exception $e) {
            return false;
        }

        if ($stmt->rowCount() != 1) {
            return false;
        }

        $s["plId"] = $PDO->lastInsertId();

        try {
            $sql = "UPDATE `orders` SET `state` = 'closed' WHERE `orders`.`id` = :id;";
            $stmt = $PDO->prepare($sql);
            $stmt->execute([':id' => $id]);
        } catch (Exception $e) {
            return false;
        }

        if ($stmt->rowCount() != 1) {
            return false;
        }

        $PDO->commit();
    } catch (Exception $err) {
        return false;
    }

    $s["result"] = true;
    $_SESSION["pl"] = $s;
    return true;
}

/**
 * 
 * To send a confirmation email to the customer
 * id --> order id
 * result --> zarinpal result
 * return --> 
 * 
 */
function sendMail($result, $id)
{
    if (isset($_SESSION["pl"])) {
        $r = $_SESSION["pl"];
        $order = getOrder($id);
        $ref_id = $result["data"]["ref_id"];
        $trackCode = $r["plId"];
        if ($order == null) {
            return;
        }
        $to      = $order->email;
        $subject = 'خرید یوسی';
        $message = '  خرید شما با موفقیت انجام شد  ';
        $message = $message . "  شماره تراکنش  $ref_id ";
        $message = $message . "  شماره رهگیری  $trackCode ";
        $headers = 'From: ' . BASE_MAIL;
        mail($to, $subject, $message, $headers);
    }
}


/**
 * 
 * To get a member from the paidlist
 * id --> paidlist id
 * return --> PDO::FETCH_OBJ or null
 * 
 */
function getPaidForTrack($id)
{
    global $PDO;
    try {
        $sql = "select * from paidlist where id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        return null;
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

/**
 * 
 * To track the order
 * id --> paidlist id
 * return --> array
 * 
 */
function getTrack($id)
{
    $arr = [];
    $paied = getPaidForTrack($id);
    if ($paied == null) {
        array_push($arr, ".متاسفانه شفارشی با این کد رهگیری وجود ندارد");
        return $arr;
    }
    switch ($paied->state) {
        case 'unpaid':
            array_push($arr, ".سفارش شما با موفقیت ثبت و در حال پردازش هست");
            array_push($arr, "$paied->created_at   :زمان سفارش");
            array_push($arr, "$paied->uc uc  :مقدار سفارش");
            // array_push($arr, "$paied->uc uc  :مبلغ سفارش");
            break;
        case 'paid':
            array_push($arr, ".سفارش شما باموفقیت ثبت و پردازش شده");
            array_push($arr, "$paied->created_at   :زمان ثبت سفارش");
            array_push($arr, "$paied->paid_at   :زمان انجام سفارش");
            array_push($arr, "$paied->uc uc  :مقدار سفارش");
            array_push($arr, ".با تشکر از اعتماد شما");
            return $arr;
            break;
        default:
            array_push($arr, ".سفارش شما از روند معمولی پردازش خارج شده با پشتیبانی تماس حاصل نمایید");
            break;
    }
    return $arr;
}
