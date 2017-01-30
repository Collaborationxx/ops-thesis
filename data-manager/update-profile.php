<?php
include('../config/db_connection.php');
//include functions.php to test sql injections
include('../authentication/functions.php');

$username = test_input($_POST['username']);
$fname = test_input($_POST['firstName']);
$lname = test_input($_POST['lastName']);
$address = test_input($_POST['address']);
$shipAddress = test_input($_POST['shippingAddress']);
$contact = test_input($_POST['contact']);
$email = test_input($_POST['email']);

$query = "UPDATE
            `user_account`
          SET
            first_name = '$fname',
            last_name = '$lname',
            address = '$address',
            shipping_address = '$shipAddress',
            contact_number = '$contact',
            email = '$email'
          WHERE
            username = '$username' ";

$arr = array();
if ($result = mysqli_query($con, $query)) {
    $response = array('status'=>'success');
    header('Content-Type: application/json');
    echo json_encode($response);

}