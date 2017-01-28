<?php
session_start();
//include database file for connection to the server
include('../config/db_connection.php');
//include functions.php to test sql injections
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
    print_r($row);
    // Register $username, $password and redirect to file "admin-dashboard.php"
    $role = $row['user_role'];
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    $_SESSION['user_role'] = $role;

    if($role == 1){ //admin role
        header("location: ../page/dashboard.html");
    } else if($role == 0) { //staff
        header('location: ../staff.php');
    } else { //customer
        header('location: ../customer.php');
    }


}
else {
    //redirect back to index for wrong credentials
    $message = 'Wrong username or password';
    header("Location: ../page/index.php?message=" . urlencode($message));

}

?>