<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');

$product = test_input($_POST['product']);
$qty = test_input($_POST['qty']);
$response = array();
$error = array(
    'qtyEmpty' => '',
    'invalidQty' => '',
    'productEmpty' => '',

);

if(empty($product)){
    $error['productEmpty'] = true; 
}

if(empty($qty)){
    $error['qtyEmpty'] = true;
}


if(empty($error['productEmpty']) && empty($error['invalidQty']) && empty($error['qtyEmpty'])){

    $query = "INSERT INTO `inventory` (product_id, quantity) VALUES ($product, $qty)";
    if(mysqli_query($con, $query)){
        $invID = mysqli_insert_id($con);
        mysqli_query($con, "INSERT INTO `inventory_history` (inventory_id, quantity) VALUES ($invID, $qty)");
        $response = array('status'=>'success');
    }
    header('Content-Type: application/json');
    echo json_encode($response);

} else {
    $response = array(
        'qtyEmpty' => $error['qtyEmpty'],
//        'invalidQty' => $error['qtyEmpty'],
        'productEmpty' => $error['productEmpty'],
    );
    header('Content-Type: application/json');
    echo json_encode($response);

}