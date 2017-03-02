<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../authentication/functions.php');


$id = test_input($_POST['id']);
$status = test_input($_POST['status']);
$response = array();
$arr = array();
$tbl = '';
$col = '';

$query = "UPDATE `payment` SET status = $status WHERE id = $id ";
if(mysqli_query($con, $query)){

	$select = "SELECT * FROM `payment` WHERE id = $id";
	if($result = mysqli_query($con, $select)){
		while ($row = mysqli_fetch_assoc($result)) {
	        $arr[] = $row;
	    }
	}


	foreach ($arr as $key => $value) {
		if(isset($value['order_id'])){
			$tbl = 'order_tbl';
			$tid = $value['order_id'];
		} else {
			$tbl = 'reservation_tbl';
			$tid = $value['reservation_id'];
		}
	}

	$sql = "SELECT customer_id FROM `$tbl` WHERE id = $tid";
	$customer_id = '';

	if($res=mysqli_query($con, $sql)){
		while ($row = mysqli_fetch_assoc($res)) {
	        $customer_id = $row['customer_id'];
	    }
	} 

	$subQuery = "INSERT INTO `notifications` (type, payment_id, customer_id) VALUES ('b', $id, $customer_id) ";
	mysqli_query($con, $subQuery);
	$response = array('status' => 'success');
}

header('Content-Type: application/json');
echo json_encode($response);