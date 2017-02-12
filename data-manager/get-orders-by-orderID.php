<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$oid = $_GET['oid'];
$query = "  
           SELECT
                p.id,
                p.name,
                p.picture,
                od.order_id,
                od.product_id,
                od.quantity,
                od.price
            FROM
                product p,
                order_details od
            WHERE
                p.id = od.product_id
            AND    
                od.order_id = $oid 
";
$ordersByID = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $ordersByID[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}
