<?php
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "SELECT * FROM `user_account` WHERE user_role !=2 ORDER BY user_role DESC";
$arr = array();
if ($result = mysqli_query($con, $query)) {
	/* fetch associative array */
	while ($row = mysqli_fetch_assoc($result)) {
		$arr[] = $row;
	}
	/* free result set */
	mysqli_free_result($result);
}

$select = "SELECT * FROM `user_account` WHERE user_role =2 ORDER BY last_name ASC";
$customers = array();
if ($oResult = mysqli_query($con, $select)) {
	/* fetch associative array */
	while ($oRow = mysqli_fetch_assoc($oResult)) {
		$customers[] = $oRow;
	}
	/* free result set */
	mysqli_free_result($oResult);
}

?>
