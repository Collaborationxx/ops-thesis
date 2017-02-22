<?php
include(dirname(__FILE__).'/../config/db_connection.php');
include('../authentication/functions.php');

$id= test_input($_POST['tid']);
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

if($pf == 0){
	$col = 'order_id';
	$tbl = 'order_tbl';
	$mode = 1;
} else {
	$col = 'reservation_id';
	$tbl = 'reservation_tbl';
	if($pm == 0){
		$mode = 1;
	} else{
		$mode = 2;
	}
}


if(empty($error['dpNumEmpty']) && empty($error['dpAmEmpty']) && empty($error['dpAmInvalid']) ){
	$query = "INSERT INTO `payment` ($col, deposit_number, deposit_amount, payment_for, payment_mode) VALUES ($id, '$deposit_number', $deposit_amount, $pf, $pm)";
	if(mysqli_query($con, $query)){
        $subQuery = "UPDATE `$tbl` SET payment_status = $mode WHERE id = $id";
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

    

