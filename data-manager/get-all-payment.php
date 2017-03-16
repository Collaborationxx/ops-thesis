<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "
        SELECT 
            id,
            order_id,
            reservation_id,
            deposit_number,
            deposit_amount,
            UNIX_TIMESTAMP(payment_date) as pay_date,
            payment_mode,
            payment_for,
            status
        FROM
            payment
        ORDER BY 
            pay_date DESC    
        ";

$payments = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $payments[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

?>
