<?php
session_start();
//include database file for connection to the server
include(dirname(__FILE__).'/../config/db_connection.php');//include functions.php to test sql injections
include('../includes/functions.php');

$fname = '';
$lname = '';
$password = '';
$username = '';
$address = '';
$shippingAddress = '';
$contact = '';
$email = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $username = test_input($_POST["username"]);
    $password = test_input(md5($_POST["password"]));
	$address = test_input ($_POST["address"]);
    $shippingAddress = test_input ($_POST["ship-address"]);
	$contact = test_input ($_POST["contact"]);
	$email = test_input ($_POST["email"]);

}


if(!empty($fname) && !empty($lname) && !empty($password) && !empty($username)) {
    if(!mysqli_query($con, "INSERT INTO `user_account` (first_name, last_name, address, shipping_address, contact_number, email, username, password, user_role) VALUES ('$fname', '$lname', '$address', '$shippingAddress', '$contact', '$email','$username', '$password', 2)")){
            echo("Error description: " . mysqli_error($con));
    }
    $status = 'Success';
    header("Location: ../shopping-cart.php?status=" . urlencode($status));
}
else {
    $message = 'Required Fields';
    header("Location: ../shopping-cart.php?message=" . urlencode($message));

}


?>