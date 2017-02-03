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
        AND
            i.quantity <= 5
";
$alert = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $alert[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}
