<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "SELECT * FROM `product` ";
$arr = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

?>
