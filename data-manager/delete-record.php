<?php
include('../config/db_connection.php');

$id = $_GET['id'];
$sql = "DELETE FROM user_account WHERE id = '$id' ";

if (mysqli_query($con, $sql)) {
    $message = 'record deleted!';
    header("Location: ./../user.php?message=" . urlencode($message));
} else {
    $message = "Error deleting record: " . mysqli_error($conn);
    header("Location: ./../user.php?message=" . urlencode($message));
}