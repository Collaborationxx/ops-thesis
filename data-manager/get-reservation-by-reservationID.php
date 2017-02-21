<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$rid = $_GET['rid'];

$query = "  
           SELECT
                p.id,
                p.name,
                p.picture,
                rd.reservation_id,
                rd.product_id,
                rd.quantity,
                rd.price,
                rd.quantity * rd.price as total
            FROM
                product p,
                reservation_details rd
            WHERE
                p.id = rd.product_id
            AND    
                rd.reservation_id = $rid 
";
$reservationsByID = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $reservationsByID[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

if(isset($_POST['fcp'])){
    header('Content-Type: application/json');
    echo json_encode(array('reservation' => $reservationsByID));
}
