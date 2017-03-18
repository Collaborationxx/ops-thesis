<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$query = "  
            SELECT
                r.id,
                r.customer_id,
                r.customer_name,
                UNIX_TIMESTAMP(r.transaction_date) as transaction_date,
                rd.product_id,
                rd.price,
                rd.quantity,
                r.payment_status,
                u.last_name,
                u.first_name
            FROM
                reservation_tbl r,
                reservation_details rd,
                user_account u
            WHERE
                r.id = rd.reservation_id
            AND
                r.type = 1
            AND
                r.customer_id = u.id    
            ORDER BY
                r.transaction_date DESC   
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


$pendingReservations = array();
$select = "SELECT * FROM  `reservation_tbl` WHERE payment_status = 0";
if ($cResult = mysqli_query($con, $select)) {
    /* fetch associative array */
    while ($cRow = mysqli_fetch_assoc($cResult)) {
        $pendingReservations[] = $cRow;
    }
    /* free result set */
    mysqli_free_result($cResult);
}
