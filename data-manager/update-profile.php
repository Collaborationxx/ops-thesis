<?php
include('../config/db_connection.php');

$username = $_POST['username'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$address = $_POST['address'];
$shipAddress = $_POST['shippingAddress'];
$contact = $_POST['contact'];
$email = $_POST['email'];

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