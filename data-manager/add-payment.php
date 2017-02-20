<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../authentication/functions.php');

$order_id = test_input($_POST['oid']);
$deposit_number = test_input($_POST['dp_number']);
$deposit_amount = test_input($_POST['dp_amount']);
$pf = $_POST['pf']; //payment for 0=order; 1=reservation
$pm = $_POST['pm']; //payment mode 0=partial 1=full
$response = array();
$error = array(
	'dpNumEmpty' => '',
	'dpAmEmpty' => '',
	'dpAmInvalid' => ''
	);

if(empty($deposit_number)){
	$error['dpNumEmpty'] =  true;
}

if(empty($deposit_amount)){
	$error['dpAmEmpty'] = true;
} else {
	if(!is_numeric($deposit_amount)){
		$error['dpAmInvalid'] = true;
	}
}


if(empty($error['dpNumEmpty']) && empty($error['dpAmEmpty']) && empty($error['dpAmInvalid']) ){
	$query = "INSERT INTO `payment` (order_id, deposit_number, deposit_amount, payment_for, payment_mode) VALUES ($order_id, '$deposit_number', $deposit_amount, $pf, $pm)";
	if(mysqli_query($con, $query)){
        $subQuery = "UPDATE `order_tbl` SET payment_status = 1 WHERE id = $order_id";
        if(mysqli_query($con, $subQuery)){
           $response = array('status' => 'success');
    	}
    	header('Content-Type: application/json');
		echo json_encode($response);
	}
} else {
	$response = array(
		'dpNumEmpty' => $error['dpNumEmpty'],
		'dpAmEmpty' => $error['dpAmEmpty'],
		'dpAmInvalid' => $error['dpAmInvalid']
	);
	header('Content-Type: application/json');
	echo json_encode($response);
}

    

