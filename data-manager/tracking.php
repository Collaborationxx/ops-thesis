<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$trackers = array();
$response = array();

//get orders with confirmed paymet from database
$oCount = 1;
$oData = array();
$oSelect = "SELECT
				o.id,
				UNIX_TIMESTAMP(o.order_date) as oDate
			FROM
				order_tbl o,
			    payment p
			WHERE
				p.order_id = o.id
			AND
				p.status = 1";
if($oResult = mysqli_query($con, $oSelect)){
	while($oRow = mysqli_fetch_assoc($oResult)){
		$oData['o'.$oCount]['oid'] = $oRow['id'];
		$oData['o'.$oCount]['oDate'] = $oRow['oDate'];

		$oCount++;
	}

	mysqli_free_result($oResult);
}

//get reservation with confirmed paymet from database
$rCount = 1;
$rData = array();
$rSelect = "SELECT
				r.id,
				UNIX_TIMESTAMP(r.reserved_date) as rDate
			FROM
				reservation_tbl r,
			    payment p
			WHERE
				p.reservation_id = r.id
			AND
				p.status = 1";
if($rResult = mysqli_query($con, $rSelect)){
	while($rRow = mysqli_fetch_assoc($rResult)){
		$rData['r'.$rCount]['rid'] = $oRow['id'];
		$rData['r'.$rCount]['rDate'] = $oRow['rDate'];

		$rCount++;
	}

	mysqli_free_result($rResult);
}

$options = array_merge($oData, $rData);




//insert new row to the table 'track_order'
if(isset($_POST['action']) AND $_POST['action'] == 'c'){
	$orderID = $_POST['oid'];
	$customerID = $_POST['cid'];
	$trackingNumber = $_POST['tn'];
	$query = "INSERT INTO `track_order` (order_id, customer_id) VALUES ($order_id, $customerID)";
	if(mysqli_query($con, $query)){
		$response = array('status' => 'sucess');
	}
header('Content-Type: application/json');
echo json_encode($response);

}





