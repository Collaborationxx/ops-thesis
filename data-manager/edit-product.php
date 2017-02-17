<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../authentication/functions.php');

$id = $_POST['id'];
$name = $_POST['product'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$category = $_POST['category'];
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
$dir = dirname(__FILE__).'/../assets/images/products/';

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
    $query = "UPDATE
                `product`
              SET
                  name = '$name',
                  description = '$desc',
                  price = $price,
                  picture = '$photo_name',
                  category = $category
              WHERE
                  id = $id
              ";

    if(mysqli_query($con, $query)){
        $response = array('status'=>'success');
        //file_put_contents($dir.$photo_name, file_get_contents($photo));
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