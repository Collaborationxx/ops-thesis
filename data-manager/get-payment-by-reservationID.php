<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');

$rid = test_input($_POST['rid']);

$query = "SELECT * FROM `payment` WHERE reservation_id = $rid";
$rPayment = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $rPayment[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

header('Content-Type: application/json');
echo json_encode(array('payment_details' => $rPayment));
