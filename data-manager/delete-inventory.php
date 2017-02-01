<?php
include('../config/db_connection.php');

$id = $_POST['id'];
echo $id;

$sql = "DELETE FROM `inventory` WHERE id = $id ";

if (mysqli_query($con, $sql)) {
    echo $sql; exit();
    $response = 'delete success';
    header('Content-Type: application/json');
    echo json_encode(array('response' => $response));
} else {
    $response_err = "Error deleting record: " . mysqli_error($con);
    header('Content-Type: application/json');
    echo json_encode(array('error' => $response_err));
}