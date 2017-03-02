<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../authentication/functions.php');

$cid = test_input($_POST['id']);
$notifications = array();

$select = " SELECT * 
			FROM
				 `notifications`
			WHERE
				customer_id = $cid
			AND
				insert_date BETWEEN DATE_SUB(NOW(), INTERVAL 0.5 HOUR) AND NOW()	
			ORDER BY
				insert_date DESC
			";

if($result = mysqli_query($con, $select)){
	while($row = mysqli_fetch_assoc($result)){
		$notifications[] = $row; 
	}

	header('Content-Type: application/json');
	echo json_encode(array('notifications' => $notifications));
}
