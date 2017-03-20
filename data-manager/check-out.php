<?php
include(dirname(__FILE__).'/../config/db_connection.php');


$orders =$_POST['items']; //echo print_r($orders);
$userID = $_POST['userID'];
$param = isset($_POST['param']) ? $_POST['param'] : ''; //echo $param;
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
    }
}
        
header('Content-Type: application/json');
echo json_encode($response);
