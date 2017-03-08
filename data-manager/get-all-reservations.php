<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$query = "  
            SELECT
                r.id,
                r.customer_id,
                r.customer_name,
                UNIX_TIMESTAMP(r.reserved_date) as reserved_date,
                rd.product_id,
                rd.price,
                rd.quantity,
                r.payment_status
            FROM
                reservation_tbl r,
                reservation_details rd
            WHERE
                r.id = rd.reservation_id
            AND
                r.reservation_type = 1
            ORDER BY
                r.reserved_date DESC   
";
$allReservations = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $allReservations[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}
