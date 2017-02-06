<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$productID = $_POST['product_id'];
$customerID = $_POST['customer_id'];
$customerName = $_POST['customer_name'];
$qty = $_POST['qty'];
$orderType = $_POST['order-type'];
$userID = $_POST['user-id'];
$response = array();
