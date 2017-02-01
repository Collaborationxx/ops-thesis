<?php
include('../config/db_connection.php');

$name = $_POST['product'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$category =$_POST['category'];
$photo = $_POST['photo'];
$response = array();
$error = array(
    'categoryEmpty' => '',
    'productEmpty' =>'',
    'priceEmpty' => '',
    'invalidPhoto' => '',
    'invalidPrice' => '',
);

if(empty($category)){
    $error['categoryEmpty'] = true;
}
if(empty($name)){
    $error['productEmpty'] = true;
}
if(!empty($price)){
    if(filter_var($price, FILTER_VALIDATE_FLOAT) === false){
        $error['invalidPrice'] = true;
    }
} else{
    $error['priceEmpty'] = true;
}

if(empty($error['categoryEmpty']) && empty($error['pruductEmpty']) && empty($error['priceEmpty']) && empty($error['invalidPrice'])){
    $query = "INSERT INTO `product` (name, description, price, category) VALUES ('$name', '$desc', $price, $category)";
    if(mysqli_query($con, $query)){
        $response = array('status'=>'success');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array(
        'categoryEmpty' =>  $error['categoryEmpty'],
        'productEmpty' => $error['productEmpty'],
        'priceEmpty' => $error['priceEmpty'],
        'invalidPrice' => $error['invalidPrice'],
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


?>