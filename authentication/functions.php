<?php
/** test input data for sql injections
 * @param $data mixed
 * @return mixed
 */
function test_input($data) 
{
    $data = trim($data); //remove whitespace (or other characters) from the beginning and end of a string
    $data = stripslashes($data);  //remove slashes
    $data = htmlspecialchars($data); //remove html special characters
    return $data;
}

/** mask user role to display word value
 * @param $role int
 * @return mixed
 */
function userRoles($role)
{
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

/** Set landing page base on user role
 * @param $role int
 * @return mixed
 */
function landingPage($role) 
{
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

//product category
function category($id)
{
    $name = '';
    switch ($id){
        case 1:
            $name = 'Electronic';
            break;
        case 2:
            $name = 'Self-Care';
            break;
        case 3:
            $name = 'Diagnostic';
            break;
        case 4:
            $name = 'Surgical';
            break;
        case 5:
            $name = 'Durable Medical Equipment';
            break;
        case 6:
            $name = 'Acute Care';
            break;
        case 7:
            $name = 'Emergency and Trauma';
            break;
        case 8:
            $name = 'Long-Term Care';
            break;
        case  9:
            $name = 'Storage and Transport';
            break;
    }

    return $name;

}