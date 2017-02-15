<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$order_id = $_POST['order_id'];
$deposit_number = $_POST['deposit_number'];
$deposit_amount = $_POST['deposit_amount'];
$response = array();


$query = "INSERT INTO `payment` (order_id, deposit_number, deposit_amount) VALUES ($order_id, '$deposit_number', $deposit_amount)";
if(mysqli_query($con, $query)){
        $subQuery = "UPDATE `order_tbl` SET payment_status = 1 WHERE id = $order_id";
        if(mysqli_query($con, $subQuery)){
           $response = array('status' => 'success');
        }
    }
header('Content-Type: application/json');
echo json_encode($response);
