<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$cid = $_POST['id'];
$notifications = array();

$select = " SELECT 
				id,
				type,
				tracking_id,
				customer_id,
				payment_id,
				UNIX_TIMESTAMP(insert_date) as insert_date
				-- insert_date
			FROM
				 `notifications`
			WHERE
				customer_id = $cid
			AND 
				insert_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 SECOND) AND NOW()		
			ORDER BY
				insert_date DESC
			";

if($result = mysqli_query($con, $select)){ 
	while($row = mysqli_fetch_assoc($result)){
		$notifications[] = $row; 
	}

	foreach ($notifications as $key => $value) {
		$id = $value['payment_id'];
		$sql = "SELECT * FROM `payment` WHERE id = $id ";
		if($res = mysqli_query($con, $sql)){
			$row = mysqli_fetch_assoc($res);

			$rid = isset($row['reservation_id']) ? $row['reservation_id'] : '';
			$oid = isset($row['order_id']) ? $row['order_id'] : '';

			$notifications[$key]['reservation_id'] = $rid;
			$notifications[$key]['order_id'] = $oid;
			$notifications[$key]['payment_status'] = $row['status'];
		}
	}

	mysqli_free_result($result);

}

header('Content-Type: application/json');
echo json_encode($notifications);
