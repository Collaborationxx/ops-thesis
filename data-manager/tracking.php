<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$trackers = array();
$response = array();

//get orders with confirmed paymet from database
$oCount = 1;
$oData = array();
$oSelect = "SELECT
				o.id,
				o.customer_id,
				UNIX_TIMESTAMP(o.order_date) as oDate,
				p.id as pid
			FROM
				order_tbl o,
			    payment p
			WHERE
				p.order_id = o.id
			AND
				p.status = 1";
if($oResult = mysqli_query($con, $oSelect)){
	while($oRow = mysqli_fetch_assoc($oResult)){
		$oData[$oRow['id']]['char'] = 'O';
		$oData[$oRow['id']]['cid'] = $oRow['customer_id'];
		$oData[$oRow['id']]['id'] = $oRow['id'];
		$oData[$oRow['id']]['date'] = $oRow['oDate'];
		$oData[$oRow['id']]['pid'] = $oRow['pid'];

		$oCount++;
	}

	mysqli_free_result($oResult);
}

//get reservation with confirmed paymet from database
$rCount = 1;
$rData = array();
$rSelect = "SELECT
				r.id,
				r.customer_id,
				UNIX_TIMESTAMP(r.reserved_date) as rDate,
				p.id as pid
			FROM
				reservation_tbl r,
			    payment p
			WHERE
				p.reservation_id = r.id
			AND
				p.status = 1";
if($rResult = mysqli_query($con, $rSelect)){
	while($rRow = mysqli_fetch_assoc($rResult)){
		$rData[$rRow['id']]['char'] = 'R';
		$rData[$rRow['id']]['cid'] = $rRow['customer_id'];
		$rData[$rRow['id']]['id'] = $rRow['id'];
		$rData[$rRow['id']]['date'] = $rRow['rDate'];
		$rData[$rRow['id']]['pid'] = $rRow['pid'];

		$rCount++;
	}

	mysqli_free_result($rResult);
}

$options = array_merge($oData, $rData);




//insert new row to the table 'track_order'
if(isset($_POST['action']) AND $_POST['action'] == 'c'){
	$orderID = $_POST['oid'];
	// $reservationID = $_POST['rid'];
	$customerID = $_POST['cid'];
	$trackingNumber = $_POST['tn'];
	$pid = $_POST['pid'];
	$type = 'a';

	$query = "INSERT INTO `track_logs` (order_id, customer_id, tracking_number) VALUES ($orderID, $customerID, '$trackingNumber') ";

	if(mysqli_query($con, $query)){
		$response = array('status' => 'sucess');
	} else {
		echo("Error description: " . mysqli_error($con));
	}

header('Content-Type: application/json');
echo json_encode($response);

}





