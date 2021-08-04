<?php

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


function checkProduct($p)
{
    $o = array(
        "product" => $p["uc"],
        "userid" => $p["id"],
        "username" => $p["uName"],
        "name" => $p["name"],
        "email" => $p["email"],
        "number" => $p["tel"],
        "description" => $p["dec"]
    );

    return addOrder($o);
}


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


function getUcPrice($id)
{
    $product = getProduct($id);
    if ($product != null) {
        return $product->price;
    }
    return null;
}

function getUcvalue($id)
{
    $product = getProduct($id);
    if ($product != null) {
        return $product->value;
    }
    return null;
}


function getOrderPrice($oId)
{
    $order = getOrder($oId);
    if ($order != null) {
        return getUcPrice($order->product);
    }
    return null;
}


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


function sendMail($result,$id)
{
    $order = getOrder($id);
$number = 20;
    if ($order == null) {
        return ;
    }
    if (isset($_SESSION["pl"])) {
        $to      = $order->email;
        $subject = 'خرید یوسی';
        $message = 'خرید شما با موفقیت انجام شد\n'."شماره رهگیری: $number";
        $headers = 'From: '.BASE_MAIL ;

        mail($to, $subject, $message, $headers);
    }
}



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

/** */
function getFolders()
{
    global $PDO;
    $current_user_id = getCurrentUserId();
    try {
        $sql = "select * from folder where user_id= $current_user_id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        diePage($e->getMessage(), "get Folder Faile");
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

function deleteFolder($folder_id)
{
    global $PDO;
    try {
        $sql = "delete from folder where id= $folder_id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        diePage($e->getMessage(), "delete Folder Faile");
    }

    return $stmt->rowCount();
}

function addFolder($folderName)
{
    $current_user_id = getCurrentUserId();

    global $PDO;
    try {
        $sql = "INSERT INTO `folder` (`name`, `user_id`) VALUES (:folderName, :current_user_id);";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':folderName' => $folderName, ':current_user_id' => $current_user_id]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "add Folder Faile");
    }

    return '{"response":' . $stmt->rowCount() . ',"id":' . $PDO->lastInsertId() . '}';
}
function getTasks($folder_id = 0)
{
    $s = "";
    if ($folder_id != 0) {
        $s = " and folder_id= $folder_id";
    }
    global $PDO;
    $current_user_id = getCurrentUserId();
    try {
        $sql = "select * from tasks where user_id= $current_user_id $s";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        diePage($e->getMessage(), "get tasks Faile");
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}


function deleteTasks($task_id)
{
    global $PDO;
    try {
        $sql = "delete from tasks where id= $task_id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        diePage($e->getMessage(), "delete Task Faile");
    }

    return $stmt->rowCount();
}


function addTask($title, $folderId)
{

    $current_user_id = getCurrentUserId();

    global $PDO;
    try {
        $sql = "INSERT INTO `tasks` (`title`, `user_id`,`folder_id`) VALUES (:title, :current_user_id, :folderId);";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':title' => $title, ':current_user_id' => $current_user_id, ':folderId' => $folderId]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "add task Faile");
    }

    return '{"response":' . $stmt->rowCount() . ',"id":' . $PDO->lastInsertId() . '}';
}


function doneSwitch($taskId)
{
    $current_user_id = getCurrentUserId();

    global $PDO;
    try {
        $sql = "Update `tasks` set is_done = 1 - is_done where user_id = :userId and  id = :taskId;";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':taskId' => $taskId, 'userId' => $current_user_id]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "Switch task Faile");
    }

    return '{"response":' . $stmt->rowCount() . ',"id":' . $PDO->lastInsertId() . '}';
}

function removeTasks()
{
    return [1, 1, 2, 3, 4];
}
