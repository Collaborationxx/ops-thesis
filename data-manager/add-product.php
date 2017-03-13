<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');

$name = test_input($_POST['product']);
$desc = test_input($_POST['desc']);
$price = test_input($_POST['price']);
$category = test_input($_POST['category']);
$available = test_input($_POST['available']);
$phase_out = test_input($_POST['phase_out']);
$photo = $_POST['photo'] == '#' ? $photo = '../placeholder.txt' : $_POST['photo'];
$photo_name = $_POST['photo_name'];
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
$mimeType = finfo_file($finfo, $photo);
$allowedImgType = array('image/jpeg', 'image/png');
$response = array();
$error = array(
    'categoryEmpty' => '',
    'productEmpty' =>'',
    'priceEmpty' => '',
    'invalidPhoto' => '',
    'invalidPrice' => '',
    'productExist' => ''
);
$dir = '../assets/images/products/';

if(empty($category)){
    $error['categoryEmpty'] = true;
}
if(empty($name)){
    $error['productEmpty'] = true;
}

if(empty($price)){
    $error['priceEmpty'] = true;
}

if(!in_array($mimeType, $allowedImgType)){
    $error['invalidPhoto'] = true;
}

/** check if product is existing in the database **/
$sql = "SELECT * FROM `product` WHERE name = '$name' ";
if($result = mysqli_query($con, $sql)){
    while($row = mysqli_fetch_assoc($result)){
        if(strtolower($row['name']) == strtolower($name)){ //this will check for exact match; case-insensitive.
             $error['productExist'] = true;
        }
    }
}


if(empty($error['categoryEmpty']) && empty($error['pruductEmpty']) && empty($error['priceEmpty']) && empty($error['invalidPrice']) && empty($error['invalidPhoto']) &&  empty($error['productExist']) ){

    $query = "INSERT INTO `product` (name, description, price, picture, category, availability, phase_out) VALUES ('$name', '$desc', $price, '$photo_name', $category, $available, $phase_out)";
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
        'invalidPhoto' => $error['invalidPhoto'],
        'productExist' =>  $error['productExist']
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


?>