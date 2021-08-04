<?php


function getPaidList($state = "unpaid")
{
    global $PDO;
    try {
        $sql = "SELECT * FROM `paidlist` WHERE `state` = :unpaid";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':unpaid' => $state]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "get products Faile");
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}


function getPaid($id)
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


function getLastPaidList(int $limit = 10)
{
    global $PDO;
    try {
        $sql = "SELECT * FROM `paidlist` ORDER BY `paidlist`.`id` DESC LIMIT $limit";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        diePage($e->getMessage(), "getLastPaidList Faile");
    }
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}


function unPaidToPaid(int $id)
{
    global $PDO;
    try {
        $sql = "UPDATE `paidlist` SET `state` = 'paid' , `paid_at` = current_timestamp() WHERE `paidlist`.`id` = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "unPaidToPaid Faile");
    }
    return $stmt->rowCount() == 1 ? true : false;
}

function PaidToUnPaid($id){
    global $PDO;
    try {
        $sql = "UPDATE `paidlist` SET `state` = 'unpaid', `paid_at` = null  WHERE `paidlist`.`id` = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        diePage($e->getMessage(), "unPaidToPaid Faile");
    }
    return $stmt->rowCount() == 1 ? true : false;
}