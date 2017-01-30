<?php
session_start();
//include database file for connection to the server
include('../config/db_connection.php');
//include functions.php to test sql injections
include('../authentication/functions.php');


$fname = '';
$lname = '';
$password = '';
$username = '';
$address = '';
$contact = '';
$email = '';
$role = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $username = test_input($_POST["username"]);
	$address = test_input ($_POST["address"]);
	$contact = test_input ($_POST["contact"]);
	$email = test_input ($_POST["email"]);
	$role = test_input ($_POST["role"]);

}


if(!empty($fname) && !empty($lname) && !empty($password) && !empty($username)) {
    mysqli_query($con, "INSERT INTO user_account (username, password, first_name, last_name, address, contact_number, email, user_role) VALUES ('$username', '$password', '$fname', '$lname', '$address', '$contact', '$email', '$role' )");
    $status = 'Success';

    header("Location: ../user.php?status=" . urlencode($message));;
}
else {
    $message = 'Required Fields';
    header("Location: ../user.php?message=" . urlencode($message));

}


?>