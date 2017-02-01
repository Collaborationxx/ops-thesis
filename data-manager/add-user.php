<?php
session_start();
//include database file for connection to the server
include('./config/db_connection.php');
//include functions.php to test sql injections
include('../authentication/functions.php');

$fname = test_input($_POST["fname"]);
$lname = test_input($_POST["lname"]);
$username = test_input($_POST["username"]);
$address = test_input ($_POST["address"]);
$contact = test_input ($_POST["contact"]);
$email = test_input ($_POST["email"]);
$role = test_input ($_POST["user_role"]);
$password = md5('ops1234');
$response = array();
$error = array(
    'fnameEmpty' => '',
    'lnameEmpty' => '',
    'addressEmpty' => '',
    'contactEmpty' => '',
    'emailEmpty' => '',
    'roleEmpty' => '',
    'invalidFname' => '',
    'invalidLname' => '',
    'invalidContact' => '',
    'invalidEmail' => '',
    'usernameEmpty' => '',
);

if(!empty($fname)){
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $error['invalidFname'] = true;
    }
} else {
    $error['fnameEmpty'] = true;
}

if(!empty($lname)){
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $error['invalidLname'] = true;
    }
} else {
    $error['lnameEmpty'] = true;
}

if(!empty($contact)){
    if (!is_numeric($contact)) {
        $error['invalidContact'] = true;
    }
} else {
    $error['contactEmpty'] = true;
}

if(!empty($email)){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['invalidEmail'] = true;
    }
} else {
    $error['emailEmpty'] = true;
}

if(empty($address)){
    $error['addressEmpty'] = true;
}

if(!isset($role)){
    $error['roleEmpty'] = true;
}

if(empty($username)){
    $error['usernameEmpty'] = true;
}

if(empty($error['invalidFname']) && empty($error['fnameEmpty']) && empty($error['invalidLname']) && empty($error['lnameEmpty']) &&
    empty($error['invalidContact']) && empty($error['contactEmpty']) && empty($error['emailEmpty']) &&
    empty($error['addressEmpty']) && empty($error['usernameEmpty']) && empty($error['roleEmpty'])){

    if(mysqli_query($con, "INSERT INTO `user_account` (username, password, first_name, last_name, address, contact_number, email, user_role) VALUES ('$username','$password', '$fname', '$lname', '$address', '$contact', '$email', '$role' )")){
        $response = array('status'=>'success');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
else {
    $response = array(
        'invalidFname' => $error['invalidFname'],
        'fnameEmpty' => $error['fnameEmpty'],
        'invalidLname' => $error['invalidLname'],
        'lnameEmpty' => $error['lnameEmpty'],
        'addressEmpty' => $error['addressEmpty'],
        'invalidContact' => $error['invalidContact'],
        'contactEmpty' => $error['contactEmpty'],
        'invalidEmail' => $error['invalidEmail'],
        'emailEmpty' => $error['emailEmpty'],
        'roleEmpty' => $error['roleEmpty'],
        'usernameEmpty' => $error['usernameEmpty'],
    );
    header('Content-Type: application/json');
    echo json_encode($response);

}


?>