<?php
session_start(); //to record session
//include database file for connection to the server
include(dirname(__FILE__).'/../config/db_connection.php');// ex. http://localhost
include('../includes/functions.php'); //include functions.php to test sql injections

$username = test_input($_POST['username']); //kunin yung username sa index
$password = test_input(md5($_POST['password'])); //kunin yung password sa index
$response =  array(); //array response (e.g errors)
$errors = array(
    'reqField' => '',
    'errCreds' => '', 
    'redir' => '',
    );
$redir = '';
$userID = '';

if(empty($username) || empty($password)){ //pag empty si pw at username
    $errors['reqField'] = true; //
} else {
    //query: select username and password from table user_accounts
    $sql = "SELECT * FROM user_account WHERE username='$username' and password='$password'"; 
    $result = mysqli_query($con, $sql);

    // check record if exist
    //$row = mysqli_num_rows($result);

    //fetch array value with associative key (e.g $row['tbl_col_name']; )
    $row = mysqli_fetch_assoc($result);

    //fetch array value with numeric key
    //$row = mysqli_fetch_assoc($result, MYSQLI_NUM); (e.g $row[0]) index always starts at 0.

    // If result matched $username and $password
    if($row) {
        // Register $username, $password and redirect to file "admin-dashboard.php"
        $role = $row['user_role'];
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION['user_role'] = $role;
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = ucfirst($row['first_name'])." ".ucfirst($row['last_name']);
        $redir = '';
        $userID = $_SESSION['id'];

        //pipiliin kung san babagsak
        if($role == 1){ //admin role
            $redir = 'dashboard.php';
        } else if($role == 0) { //staff
            $redir = 'staff-page.php';
        } else { //customer
            $redir = 'customer-page.php';
        }


    }
    else {
        $userID = '';
        $redir = '';
        $errors['errCreds'] = true;
    }
}

//response to post request
$response = array('reqField' => $errors['reqField'], 'errCreds' => $errors['errCreds'], 'redir' => $redir, 'userID' => $userID);
header('Content-Type: application/json');
echo json_encode($response);




?>