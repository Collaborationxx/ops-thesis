<?php
include('config/db_connection.php');

$query = "SELECT * FROM `inventory` ";
$inventory = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $inventory[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

?>
