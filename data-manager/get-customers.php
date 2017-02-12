<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "SELECT * FROM `user_account` WHERE user_role = 2 ";
$allCustomers = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $allCustomers[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}