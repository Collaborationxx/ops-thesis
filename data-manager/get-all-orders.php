<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$query = "  
            SELECT
                o.id,
                o.customer_id,
                UNIX_TIMESTAMP(o.order_date) as order_date,
                od.product_id,
                od.price,
                od.quantity,
                o.payment_status
            FROM
                order_tbl o,
                order_details od
            WHERE
                o.id = od.order_id
            AND
                o.order_type = 1
            ORDER BY
                o.order_date DESC   
";
$allOrders = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $allOrders[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}