<?php
include('../config/db_connection.php');
include('../authentication/functions.php');

$currentUsername = test_input($_POST['current_username']);
$username = test_input($_POST['username']);
$currentPassword = test_input(md5($_POST['current_password']));
$newPassword = test_input(md5($_POST['new_password']));
$retypePassword = test_input(md5($_POST['retype_password']));
$errMess = array('notMatch' => '', 'incorrect' => '');
$status = '';

$select = "SELECT * FROM `user_account` WHERE username = '$currentUsername'";


if ($result = mysqli_query($con, $select)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $password = $row['password']; 
        }

        if($newPassword !== $retypePassword){
            $errMess['notMatch'] = 'Password not match!';
        }

        if ($password !== $currentPassword){
            $errMess['incorrect'] = 'Incorrect Password!';
        }

        if($errMess['notMatch'] == '' && $errMess['incorrect'] == ''){
            $query = "UPDATE
                        `user_account`
                      SET
                        password = '$newPassword',
                        username = '$username'
                      WHERE
                        username = '$currentUsername' ";
      
            if ($result = mysqli_query($con, $query)) {
                $status = array('status' => 'Success');
                header('Content-Type: application/json');
                echo json_encode($status);
            } 

        } else {
            $response = array('errMess' => $errMess['notMatch'], 'errMess2' => $errMess['incorrect']);
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        
}




