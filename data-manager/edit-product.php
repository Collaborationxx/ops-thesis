<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../authentication/functions.php');

$id = test_input($_POST['id']);
$name = test_input($_POST['product']);
$desc = test_input($_POST['desc']);
$price = test_input($_POST['price']);
$category =test_input($_POST['category']);
$available = test_input($_POST['available']);
$phase_out = test_input($_POST['phase_out']);
$photo = $_POST['photo'] == '#' ? $photo = '../placeholder.txt' : $_POST['photo'];
$photo_name = $_POST['photo_name'];
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
$allowedImgType = array('image/jpeg', 'image/png');
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

if(substr($photo, 0, 6) == 'assets'){
    $photo = dirname(__FILE__).'/../'.$photo;
}

$mimeType = finfo_file($finfo, $photo);
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

if(empty($error['categoryEmpty']) && empty($error['pruductEmpty']) && empty($error['priceEmpty']) && empty($error['invalidPrice']) && empty($error['invalidPhoto']) ){
    $query = "UPDATE
                `product`
              SET
                  name = '$name',
                  description = '$desc',
                  price = $price,
                  picture = '$photo_name',
                  category = $category,
                  availability = $available,
                  phase_out = $phase_out
              WHERE
                  id = $id
              ";
              
    if(mysqli_query($con, $query)){
        file_put_contents($dir.$photo_name, file_get_contents($photo));
        $response = array('status'=>'success');
        header('Content-Type: application/json');
        echo json_encode($response);
    }

} else {
    $response = array(
        'categoryEmpty' =>  $error['categoryEmpty'],
        'productEmpty' => $error['productEmpty'],
        'priceEmpty' => $error['priceEmpty'],
        'invalidPrice' => $error['invalidPrice'],
        'invalidPhoto' => $error['invalidPhoto'],

    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


?>