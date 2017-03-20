<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');


$id = test_input($_POST['id']);
$status = test_input($_POST['status']);
$response = array();
$arr = array();
$tbl = '';
$col = '';
$dataTable = '';

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
			$dataTable = 'order_datails';
			$tid = $value['order_id'];
			$col = 'order_id';

		} else {
			$tbl = 'reservation_tbl';
			$dataTable = 'reservation_details';
			$tid = $value['reservation_id'];
			$col = 'reservation_id';
		}

	}

	if($status == 1){
		//updates payment_confirmation in order/reservation_tbl
		$update = "UPDATE `$tbl` SET payment_confirmed = 1 WHERE id = $tid";
		if(mysqli_query($con, $update)){

			$selectProduct = "SELECT product_id, quantity FROM `$dataTable` WHERE $col = $tid";
			if($list = mysqli_query($con, $selectProduct )){
				while($items = mysqli_fetch_assoc($list)) {
					$qty = $items['quantity'];
					$product_id = $items['product_id'];
					$updateInv = "UPDATE `inventory` SET quantity = quantity - $qty WHERE product_id = $product_id";
		    		mysqli_query($con, $updateInv);
				}
			}

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