<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$query = "  
            SELECT
                o.id,
                o.customer_id,
                o.customer_name,
                UNIX_TIMESTAMP(o.transaction_date) as transaction_date,
                od.product_id,
                od.price,
                od.quantity,
                o.payment_status,
                u.first_name,
                u.last_name
            FROM
                order_tbl o,
                order_details od,
                user_account u
            WHERE
                o.id = od.order_id
            AND
                o.type = 1
            AND
                o.customer_id = u.id    
            ORDER BY
                o.transaction_date DESC   
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

//for counting
$select = "SELECT * FROM `order_tbl` WHERE payment_status = 0";
$forCount = array();
if ($cResult = mysqli_query($con, $select)) {
    /* fetch associative array */
    while ($cRow = mysqli_fetch_assoc($cResult)) {
        $forCount[] = $cRow;
    }
    /* free result set */
    mysqli_free_result($cResult);
}
