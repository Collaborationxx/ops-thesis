<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');

$order_id = test_input($_POST['oid']);

$query = "SELECT * FROM `payment` WHERE order_id = $order_id";
$payment = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $payment[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

header('Content-Type: application/json');
echo json_encode(array('payment_details' => $payment));
