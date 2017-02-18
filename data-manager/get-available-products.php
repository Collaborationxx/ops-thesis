<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "SELECT * FROM `product` WHERE phase_out = 0 ";
$availableProducts = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $availableProducts[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
} 

?>
