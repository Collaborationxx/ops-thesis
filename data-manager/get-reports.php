<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$start = $_POST['start'];
$end = $_POST['end'];
$tbl = $_POST['table'];
$col = $_POST['column'];
$type = $_POST['type'];
$reports = array();

$start = date_format(date_create($start), 'Y-m-d').' 00:00:00';
$end = date_format(date_create($end), 'Y-m-d').' 00:00:00';

$select = "SELECT * FROM `$tbl` WHERE $col BETWEEN '$start' AND '$end' ";
if($tbl == 'order_tbl'){
	$select = "SELECT
					t.id,
					t.customer_id,
					t.customer_name,
					u.first_name,
					u.last_name,
					t.delivery_status,
					l.courier,
					t.$col as Date,
					t.payment_status,
					t.type
				FROM
					order_tbl as t,
					user_account as u,
					track_logs as l
				WHERE
					type = $type
              	AND
					t.customer_id = u.id
				AND
					l.order_id = t.id	
				AND 
					transaction_date BETWEEN '$start' AND '$end'
			";
}

if($tbl == 'reservation_tbl'){
	$select = "SELECT
				t.id,
				t.customer_id,
				t.customer_name,
				u.first_name,
				u.last_name,
				t.delivery_status,
				l.courier,
				t.$col as Date,
				t.payment_status,
				t.type
			FROM
				reservation_tbl as t,
				user_account as u,
				track_logs as l
			WHERE
				type = $type
          	AND
				t.customer_id = u.id
			AND
				l.reservation_id = t.id	
			AND 
				transaction_date BETWEEN '$start' AND '$end'
		";
}

if($tbl == 'inventory'){
	$select = "SELECT
				i.id,
				p.name,
				i.quantity,
				i.stock_date
			FROM
				inventory as i,
				product as p
			WHERE
				i.product_id = p.id	 
			";
}


if($result = mysqli_query($con, $select)){
	while($row = mysqli_fetch_assoc($result)){
		$reports[] = $row;
	}

	header('Content-Type: application/json');
	echo json_encode(array('reports' => $reports, 'category' => $tbl));
} else {
	echo 'Error: '.mysqli_error($con);
}
