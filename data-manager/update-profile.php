<?php
include('../config/db_connection.php');
//include functions.php to test sql injections
include('../authentication/functions.php');

$username = test_input($_POST['username']);
$fname = test_input($_POST['firstName']);
$lname = test_input($_POST['lastName']);
$address = test_input($_POST['address']);
$shipAddress = test_input($_POST['shippingAddress']);
$contact = test_input($_POST['contact']);
$email = test_input($_POST['email']);
$errMess = array('errFname' => '', 'errLname' => '', 'errContact' => '', 'errEmail' => '');

if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
  $errMess['errFname'] = "Only letters and white space allowed"; 
}

if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
  $errMess['errLname'] = "Only letters and white space allowed"; 
}

if (!is_numeric($contact)) {
  $errMess['errContact'] = "invalid mobile number format"; 
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errMess['errEmail'] = "Invalid email format"; 
}



if($errMess['errFname'] == '' && $errMess['errLname'] == '' && $errMess['errContact'] == '' && $errMess['errEmail'] == ''){
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
    $response = array('errFname'=> $errMess['errFname'], 'errLname'=> $errMess['errLname'], 'errContact' => $errMess['errContact'], 'errEmail' =>$errMess['errEmail']);
    header('Content-Type: application/json');
    echo json_encode($response);
}

