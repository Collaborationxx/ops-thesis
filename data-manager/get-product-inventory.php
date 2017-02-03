<?php
/**
 * this file is for dropdown in inventory popup
 */
include(dirname(__FILE__).'/../config/db_connection.php');

/**
 * select product that is not in the the inventory table.
 * if the product is already in the inventory table, it should not appear on product dropdown.
 * */
$query = "
            SELECT 
                id,
                name
            FROM
                product
            WHERE
                 id NOT IN (SELECT product_id FROM inventory)
";
$itemsLeft = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $itemsLeft[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}