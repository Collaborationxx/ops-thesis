<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$query = "  
            SELECT
                o.id,
                o.payment_status,
                UNIX_TIMESTAMP(o.transaction_date) as transaction_date,
                od.product_id,
                od.price,
                od.quantity
            FROM
                order_tbl o,
                order_details od
            WHERE
                o.id = od.order_id
            AND
                o.customer_id = $id
            ORDER BY
                o.transaction_date DESC   
";
$orders = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}
