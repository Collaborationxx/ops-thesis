<?php
/** test input data for sql injections
 * @param $data mixed
 * @return mixed
 */
function test_input($data) {
  $data = trim($data); //remove whitespace (or other characters) from the beginning and end of a string
  $data = stripslashes($data);  //remove slashes
  $data = htmlspecialchars($data); //remove html special characters
  return $data;
}

function userRoles($role){
    $user_role = '';
    switch ($role){
        case 0:
            $user_role = 'Staff';
            break;
        case 1:
            $user_role = 'Admin';
            break;
        case 2:
            $user_role = 'Customer';
    }
    return $user_role;
}

function landingPage($role) {
  $redir = '';
  switch ($role){
        case 0:
            $redir = 'staff-page.php';
            break;
        case 1:
            $redir = 'dashboard.php';
            break;
        case 2:
            $redir = 'customer-page.php';
    }
  return $redir;
}

?>