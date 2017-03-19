<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../includes/functions.php');

$start = isset($_POST['start']) ? $_POST['start'] : '';
$end = isset($_POST['end']) ? $_POST['end'] : '';
$tbl = isset($_POST['table']) ? $_POST['table'] : '';
$col = isset($_POST['column']) ? $_POST['column'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$reports = array();

$start = date_format(date_create($start), 'Y-m-d').' 00:00:00';
$end = date_format(date_create($end), 'Y-m-d').' 00:00:00';


if($tbl == 'ol_sales' ){
	$sales = array();
	$oProduct = array();
	$oSelect = "
		SELECT 
			p.id,
			p.name,
		    p.price,
		    o.payment_status,
		    SUM(od.quantity) as sold
		FROM
			product p,
		    order_details od,
		    order_tbl o
		WHERE
			od.product_id = p.id
		AND 
			od.order_id = o.id
		AND 
			o.payment_status = 1
        AND
        	o.transaction_date BETWEEN '$start' AND '$end'    
		GROUP BY
			id
	";

	if($oResult = mysqli_query($con, $oSelect)){
		while($oRow = mysqli_fetch_assoc($oResult)){
			$oProduct[] = $oRow;
		}
	}

	$rProduct = array();
	$rSelect = "
		SELECT 
			p.id,
			p.name,
		    p.price,
		    r.payment_status,
		    SUM(rd.quantity) as sold
		FROM
			product p,
		    reservation_details rd,
		    reservation_tbl r
		WHERE
			rd.product_id = p.id
		AND 
			rd.order_id = r.id
		AND 
			r.payment_status = 2
        AND
        	r.transaction_date BETWEEN '$start' AND '$end'    
		GROUP BY
			id
	";

	if($rResult = mysqli_query($con, $rSelect)){
		while($rRow = mysqli_fetch_assoc($rResult)){
			$rProduct[] = $rRow;
		}
	}

	$sales[] = array_merge($oProduct, $rProduct);
	header('Content-Type: application/json');
	echo json_encode(array('reports' => $sales, 'category' => $tbl));
	
} else {

	//default query 
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
				AND
					stock_date BETWEEN '$start' AND '$end'	
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
}
