<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');

$id = test_input($_POST['id']);
$qty = test_input($_POST['qty']);
$aQty = test_input($_POST['aQty']);
$response = array();
$error = array('qtyEmpty' => '');

if(empty($qty)){
    $error['qtyEmpty'] = true;
}


if(empty($error['qtyEmpty'])){

    $query = "UPDATE `inventory` SET quantity = $qty WHERE id = $id";

    if(mysqli_query($con, $query)){
        $response = array('status'=>'success');
        mysqli_query($con, "INSERT INTO `inventory_history` (inventory_id, quantity) VALUES ($id, $aQty)");
    }
    header('Content-Type: application/json');
    echo json_encode($response);

} else {
    $response = array('qtyEmpty' => $error['qtyEmpty']);
    header('Content-Type: application/json');
    echo json_encode($response);
}