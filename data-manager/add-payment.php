<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$order_id = $_POST['oid'];
$deposit_number = $_POST['dp_number'];
$deposit_amount = $_POST['dp_amount'];
$pf = $_POST['pf']; //payment for 0=order; 1=reservation
$pm = $_POST['pm']; //payment mode 0=partial 1=full
$response = array();


$query = "INSERT INTO `payment` (order_id, deposit_number, deposit_amount, payment_for, payment_mode) VALUES ($order_id, '$deposit_number', $deposit_amount, $pf, $pm)";
if(mysqli_query($con, $query)){
        $subQuery = "UPDATE `order_tbl` SET payment_status = 1 WHERE id = $order_id";
        if(mysqli_query($con, $subQuery)){
           $response = array('status' => 'success');
        }
    }
    
header('Content-Type: application/json');
echo json_encode($response);
