<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = isset($_GET['product']) ? $_GET['product']: '';

$query = "SELECT * FROM `inventory_history` WHERE inventory_id = $id ";
$history = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $history[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

?>
