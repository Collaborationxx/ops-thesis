<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "SELECT * FROM `user_account` WHERE user_role = 2 ";
$customers = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $customers[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}