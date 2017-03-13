<?php
include(dirname(__FILE__).'/../config/db_connection.php');//include functions.php to test sql injections
include('../includes/functions.php');

$username = test_input($_POST['username']);
$fname = test_input($_POST['firstName']);
$lname = test_input($_POST['lastName']);
$address = test_input($_POST['address']);
$shipAddress = test_input($_POST['shippingAddress']);
$contact = test_input($_POST['contact']);
$email = test_input($_POST['email']);
$errMess = array(
    'errFname' => '',
    'errFnameReq' => '',
    'errLname' => '',
    'errLnameReq' => '',
    'errContact' => '',
    'errContactReq' => '',
    'errEmail' => '',
    'errEmailReq' => '',
    'errAddReq' => '',
);

$response = array();

if(!empty($fname)){
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $errMess['errFname'] = true;
    }
} else {
    $errMess['errFnameReq'] = true;
}

if(!empty($lname)){
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $errMess['errLname'] = "Only letters and white space allowed";
    }
} else {
    $errMess['errLnameReq'] = true;
}

if(!empty($contact)){
    if (!is_numeric($contact)) {
        $errMess['errContact'] = "invalid mobile number format";
    }
} else {
    $errMess['errContactReq'] = true;
}

if(!empty($email)){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMess['errEmail'] = "Invalid email format";
    }
} else {
    $errMess['errEmailReq'] = true;
}

if(empty($address)){
    $errMess['errAddReq'] = true;
}

if($errMess['errFname'] == '' && $errMess['errLname'] == '' && $errMess['errContact'] == '' && $errMess['errEmail'] == ''
    && $errMess['errFnameReq'] == '' && $errMess['errLnameReq'] == '' && $errMess['errContactReq'] == ''
    && $errMess['errEmailReq'] == '' && $errMess['errAddReq'] == ''){

    $query = "UPDATE
            `user_account`
          SET
            first_name = '$fname',
            last_name = '$lname',
            address = '$address',
            shipping_address = '$shipAddress',
            contact_number = '$contact',
            email = '$email'
          WHERE
            username = '$username' ";

    if ($result = mysqli_query($con, $query)) {
        $response = array('status'=>'success');
        header('Content-Type: application/json');
        echo json_encode($response);
    }




} else {
    $response = array(
        'errFname' => $errMess['errFname'],
        'errLname' => $errMess['errLname'],
        'errContact' => $errMess['errContact'],
        'errEmail' => $errMess['errEmail'],
        'errFnameReq' => $errMess['errFnameReq'],
        'errLnameReq' => $errMess['errLnameReq'],
        'errContactReq' => $errMess['errContactReq'],
        'errEmailReq' => $errMess['errEmailReq'],
        'errAddReq' => $errMess['errAddReq'],
    );

    header('Content-Type: application/json');
    echo json_encode($response);

}



