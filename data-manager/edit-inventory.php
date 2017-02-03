<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = $_POST['id'];
$qty = $_POST['qty'];
$response = array();
$error = array('qtyEmpty' => '');

if(empty($qty)){
    $error['qtyEmpty'] = true;
}


if(empty($error['qtyEmpty'])){

    $query = "UPDATE `inventory` SET quantity = $qty WHERE id = $id";

    if(mysqli_query($con, $query)){
        $response = array('status'=>'success');
    }
    header('Content-Type: application/json');
    echo json_encode($response);

} else {
    $response = array('qtyEmpty' => $error['qtyEmpty']);
    header('Content-Type: application/json');
    echo json_encode($response);
}