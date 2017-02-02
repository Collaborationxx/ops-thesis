<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$name = $_POST['product'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$category =$_POST['category'];
$photo = $_POST['photo'];
$photo_name = $_POST['photo_name'];
$response = array();
$error = array(
    'categoryEmpty' => '',
    'productEmpty' =>'',
    'priceEmpty' => '',
    'invalidPhoto' => '',
    'invalidPrice' => '',
);
$dir = '../assets/images/products/';

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
    $query = "INSERT INTO `product` (name, description, price, picture, category) VALUES ('$name', '$desc', $price, '$photo_name', $category)";
    if(mysqli_query($con, $query)){
        $response = array('status'=>'success');
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photo));
        file_put_contents($dir.$photo_name, $data);
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