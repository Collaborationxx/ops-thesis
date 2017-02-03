<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "
        SELECT 
            p.name as prod_name,
            i.product_id as prod_id,
            i.id,
            i.quantity,
            i.stock_date
        FROM
            product p,
            inventory i
        WHERE
            i.product_id = p.id
";
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
