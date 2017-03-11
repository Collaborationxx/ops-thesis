<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$cid = $_SESSION['id'];
$notifications = array();

$select = " SELECT 
				id,
				type,
				tracking_id,
				courier,
				customer_id,
				payment_id,
<<<<<<< HEAD
				(insert_date) as insert_date
=======
				insert_date
>>>>>>> 2fdfbc611815308dad1820f7369b68d38ad855f9
			FROM
				 `notifications`
			WHERE
				customer_id = $cid
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