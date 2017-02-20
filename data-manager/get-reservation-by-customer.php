<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$query = "  
            SELECT
                r.id,
                r.payment_status,
                UNIX_TIMESTAMP(o.order_date) as order_date,
                rd.product_id,
                rd.price,
                rd.quantity
            FROM
                reservation_tbl r,
                reservation_details rd
            WHERE
                r.id = rd.reservation_id
            AND
                r.customer_id = $id
            ORDER BY
                r.order_date DESC   
";
$reservationsByCustomer = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $reservationsByCustomer[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}