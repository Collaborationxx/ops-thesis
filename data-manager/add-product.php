<?php
include('./config/db_connection.php');

$name = $_POST['product'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$category =$_POST['category'];
$photo = $_POST['photo'];
$response = array();
$error = array(
    'categoryEmpty' => '',
    'pruductEmpty' =>'',
    'priceEmpty' => '',
    'invalidPhoto' => '',
);

if(empty($category)){
    $error['categoryEmpty'] = true;
}
if(empty($name)){
    $error['pruductEmpty'] = true;
}
if(empty($price)){
    $error['priceEmpty'] = true;
}

if(empty( $error['categoryEmpty']) && empty($error['pruductEmpty']) && empty($error['priceEmpty']) && empty($error['invalidPhoto'])){
    $query = "INSERT INTO `product` (name, description, price, picture, category) SET VALUES ('$name', '$desc', $price, '$photo', $category)";
    if(mysqli_query($con, $query)){
        $response = array('status'=>'success');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array(
        'categoryEmpty' =>  $error['categoryEmpty'],
        'pruductEmpty' => $error['pruductEmpty'],
        'priceEmpty' => $error['priceEmpty'],
        'invalidPhoto' => $error['invalidPhoto']
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


?>