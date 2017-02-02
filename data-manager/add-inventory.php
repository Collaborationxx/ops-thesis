<?php
include('../config/db_connection.php');

$product = $_POST['product'];
$qty = $_POST['qty'];
$error = array(
    'qtyEmpty' => '',
    'invalidQty' => '',
    'productEmpty' => '',

);
$response = array();

if(empty($product)){
    $error['productEmpty'] = true;
}

if(!empty($qty)){
    $error['invalidQty'] = true;
} else {
    $error['qtyEmpty'] = true;
}

if(empty($error['productEmpty']) && empty($error['invalidQty']) && empty($error['qtyEmpty'])){

    $query = "INSERT INTO `inventory` (product_id, quantity) VALUES ($product, $qty)";
    if(mysqli_query($con, $query)){
        $response = array('status'=>'success');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array(
        'qtyEmpty' => $error['qtyEmpty'],
        'invalidQty' => $error['qtyEmpty'],
        'productEmpty' => $error['productEmpty'],
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}