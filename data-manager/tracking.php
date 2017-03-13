<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$response = array();

//get orders with confirmed paymet from database
$oCount = 1;
$oData = array();
$oSelect = "SELECT
				o.id,
				o.customer_id,
				UNIX_TIMESTAMP(o.transaction_date) as oDate,
				p.id as pid
			FROM
				order_tbl o,
			    payment p
			WHERE
				p.order_id = o.id
			AND
				p.status = 1
			AND
				o.delivery_status = 0 ";
						
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

//get reservation with confirmed paymet and not in track_logs yet in database
$rCount = 1;
$rData = array();
$rSelect = "SELECT
				r.id,
				r.customer_id,
				UNIX_TIMESTAMP(r.transaction_date) as rDate,
				p.id as pid
			FROM
				reservation_tbl r,
			    payment p
			WHERE
				p.reservation_id = r.id
			AND
				p.status = 1
            AND
            	r.delivery_status = 0 ";

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
	$courier = $_POST['courier'];
	$pid = $_POST['pid'];
	$char = $_POST['char'];
	$type = 'a';
	$col = '';
	$tbl = '';

	if($char == 'O'){
		$col = 'order_id';
		$tbl = 'order_tbl';
	} else {
		$col = 'reservation_id';
		$tbl = 'reservation_tbl';
	}

	$query = "INSERT INTO `track_logs` ($col, customer_id, tracking_number, courier) VALUES ($orderID, $customerID, '$trackingNumber', '$courier') ";

	if(mysqli_query($con, $query)){
		//update delivery status of order/reservation
		$deliveryQuery = "UPDATE `$tbl` SET delivery_status = 1 WHERE id = $orderID";
		mysqli_query($con, $deliveryQuery);

		//add to notification table
		$subQuery = "INSERT INTO `notifications` (type, tracking_id, courier, payment_id, customer_id) VALUES ('$type', '$trackingNumber', '$courier', $pid, $customerID)";
		mysqli_query($con, $subQuery);

		$response = array('status' => 'sucess');
	} else {
		echo("Error description: " . mysqli_error($con));
	}

header('Content-Type: application/json');
echo json_encode($response);

}


//select all records in track_logs
$trackers = array();
$oTrackers = array();
$i = 0;
$selectOrders = "SELECT
				t.id,
			    t.order_id,
                UNIX_TIMESTAMP(o.transaction_date) as tdate,
			    t.tracking_number,
			    t.courier,
			    t.date_sent as date_sent,
			    c.last_name as lname,
			    c.first_name as fname
			FROM
				track_logs t,
			    user_account c,
                order_tbl o
			WHERE
				t.customer_id = c.id
            AND
            	t.order_id = o.id";

if($OrResult = mysqli_query($con, $selectOrders)){
	while($row = mysqli_fetch_assoc($OrResult)){
		$oTrackers[$i] = $row;
		$oTrackers[$i]['type'] = 'O';
		$i++;
	}
	mysqli_free_result($OrResult);
}

//select all reservation in track_logs
$rTrackers = array();
$selectReservations = "SELECT
				t.id,
			    t.reservation_id,
                UNIX_TIMESTAMP(r.transaction_date) as tdate,
			    t.tracking_number,
			    t.courier,
			    t.date_sent as date_sent,
			    c.last_name as lname,
			    c.first_name as fname
			FROM
				track_logs t,
			    user_account c,
                reservation_tbl r
			WHERE
				t.customer_id = c.id
            AND
            	t.reservation_id = r.id";

if($reResult = mysqli_query($con, $selectReservations)){
	while($row = mysqli_fetch_assoc($reResult)){
		$rTrackers[$i] = $row;
		$rTrackers[$i]['type'] = 'R';
		$i++;
	}
	mysqli_free_result($reResult);
}


$trackers = array_merge($oTrackers, $rTrackers);



