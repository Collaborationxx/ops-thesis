<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$orders = $_POST['items'];
$userID = $_POST['userID'];
$param = isset($_POST['param']) ? $_POST['param'] : '';
$response = array();

if($param == 0){ //click from checkout button'
    $query = "INSERT INTO `order_tbl` (customer_id, type) VALUES ($userID, 1)";
    $table = 'order_details';
    $col = 'order_id';
    

} else { //click form reserved
    $query = "INSERT INTO `reservation_tbl` (customer_id, type) VALUES ($userID, 1)";
    $table = 'reservation_details';
    $col = 'reservation_id';
}

if(mysqli_query($con, $query)){
    $id = mysqli_insert_id($con);
    foreach ($orders as $key => $value){
        $product = $value['id'];
        $price = $value['price'];
        $qty = $value['qty'];
        $subQuery = "INSERT INTO `$table` ($col, product_id, price, quantity) VALUES ($id, $product, $price, $qty)";
        mysqli_query($con, $subQuery);
    }
    $response = array('status' => 'success');
}

if(mysqli_query($con, $subQuery)){
            $sql = "UPDATE `inventory` SET quantity = quantity - $qty WHERE product_id = $product";
            if(mysqli_query($con, $sql)){
                $response = array('status' => 'success');
            }
        }
        
header('Content-Type: application/json');
echo json_encode($response);
