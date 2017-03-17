<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$category = isset($_GET['category']) ? $_GET['category'] : '';

$query = "SELECT * FROM `product` WHERE category = $category ";
$products = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);


}

header('Content-Type: application/json');
echo json_encode(array('products' => $products));
