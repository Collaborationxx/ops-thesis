<?php
include('../config/db_connection.php');
include('../authentication/functions.php');

$currentUsername = test_input($_POST['current_username']);
$username = test_input($_POST['username']);
$currentPassword = test_input(md5($_POST['current_password']));
$newPassword = test_input(md5($_POST['new_password']));
$retypePassword = test_input(md5($_POST['retype_password']));
$errMess = array('notMatch' => '', 'incorrect' => '', 'errCurrPass' => '', 'errNewPass' => '', 'errUsername' => '');
$response = array();

$select = "SELECT * FROM `user_account` WHERE username = '$currentUsername'";


if ($result = mysqli_query($con, $select)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $password = $row['password']; 
        }

        if(!empty($_POST['retype_password']) && !empty($_POST['new_password'])){
            if($newPassword !== $retypePassword){
                $errMess['notMatch'] = true;
            }
        } else {
            $errMess['errNewPass'] = true;
        }

        if(!empty($_POST['current_password'])){
            if ($password !== $currentPassword){
                $errMess['incorrect'] = true;
            }
        } else {
            $errMess['errCurrPass'] = true;
        }

        if(empty($username)){
            $errMess['errUsername'] = true;
        }

        if($errMess['notMatch'] == '' && $errMess['incorrect'] == '' && $errMess['errNewPass'] == '' &&
            $errMess['errCurrPass'] == '' && $errMess['errUsername'] == ''){

            $query = "UPDATE
                        `user_account`
                      SET
                        password = '$newPassword',
                        username = '$username'
                      WHERE
                        username = '$currentUsername' ";
      
            if ($result = mysqli_query($con, $query)) {
                $response = array('status' => 'Success');
                header('Content-Type: application/json');
                echo json_encode($response);
            } 

        } else {
            $response = array(
                'errMess' => $errMess['notMatch'],
                'errMess2' => $errMess['incorrect'],
                'errNewPass' => $errMess['errNewPass'],
                'errCurrPass' => $errMess['errCurrPass'],
                'errUsername' => $errMess['errUsername'],
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        }


}




