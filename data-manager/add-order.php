<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');

$orders = $_POST['order_details'];
$orderType = test_input($_POST['order_type']);
$userID = test_input($_POST['user_id']);
$customerName = test_input($_POST['customer']);
$response = array();

$query = "INSERT INTO `order_tbl` (customer_name, type, payment_status, payment_confirmed, delivery_status) VALUES ('$customerName', $orderType, 1, 1, 1)";
if(mysqli_query($con, $query)){
    $order_id = mysqli_insert_id($con);
    foreach ($orders as $key => $value){
        
        $product = $value['prod_id'];
        $price = $value['price'];
        $qty = $value['qty'];
        $subQuery = "INSERT INTO `order_details` (order_id, product_id, price, quantity) VALUES ($order_id, $product, $price, $qty)";
        if(mysqli_query($con, $subQuery)){
            $sql = "UPDATE `inventory` SET quantity = quantity - $qty WHERE product_id = $product";
            if(mysqli_query($con, $sql)){
                $insert = "INSERT INTO `track_logs` (order_id) VALUES ($order_id)";
                mysqli_query($con, $insert);
                $response = array('status' => 'success');
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}



