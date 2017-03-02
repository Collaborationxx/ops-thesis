<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$cid = $_SESSION['id'];
$notifications = array();

$select = " SELECT * 
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
		$sql = "SELECT * FROM `payment` WHERE id = $value['payment_id']";
		if($res = mysqli_query($con, $query){
			$row = mysqli_fetch_assoc();
			array_push($notifications[$key]['reservation_id'], $row['reservation_id']);
		}
	}



	mysqli_free_result($result);

}