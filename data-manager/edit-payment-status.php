<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../authentication/functions.php');


$id = test_input($_POST['id']);
$status = test_input($_POST['status']);
$response = array();

$query = "UPDATE `payment` SET status = $status WHERE id = $id ";
if(mysqli_query($con, $query)){
	$response = array('status' => 'success');
}

header('Content-Type: application/json');
echo json_encode($response);