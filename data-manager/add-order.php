<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$orders = $_POST['order_details'];
$orderType = $_POST['order_type'];
$userID = $_POST['user_id'];
$response = array();


$query = "INSERT INTO `order_tbl` (order_type) VALUES ($orderType)";
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
                $response = array('status' => 'success');
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}



