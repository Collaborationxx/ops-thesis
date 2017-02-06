<?php
session_start();
//include database file for connection to the server
include(dirname(FILE).'/../config/db_connection.php');//include functions.php to test sql injections
include('../authentication/functions.php');


$username = "";
$password = "";

//test data for sql injections
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input(md5($_POST["password"]));
}

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

    if($role == 1){ //admin role
        header("location: ../dashboard.php");
    } else if($role == 0) { //staff
        header('location: ../staff-page.php');
    } else { //customer
        header('location: ../customer-page.php');
    }


}
else {
    //redirect back to index for wrong credentials
    $message = 'Wrong username or password';
    header("Location: ../index.php?message=" . urlencode($message));

}

?>