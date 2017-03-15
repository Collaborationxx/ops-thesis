<?php
require_once('../plugins/PHPEXcel/Classes/PHPEXcel.php');
include(dirname(__FILE__).'/../config/db_connection.php');

$headers = json_decode($_POST['headers'],true);
$body = json_decode($_POST['body'], true);
$category = $_POST['reportName'];

// echo '<pre>'; print_r($headers);
// echo '<pre>'; print_r($body);
// echo $category;
// exit;

$query = "SELECT * FROM `inventory` ";
$arr = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_array($result)) {
        $arr[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

// echo '<pre>'; print_r($arr); exit;

//create new instance of PHPExcel
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator('Admin');
$objPHPExcel->getProperties()->setLastModifiedBy('Admin');
$objPHPExcel->getProperties()->setTitle('Test Excel');
$objPHPExcel->getProperties()->setSubject('Testing');

$i =1;
$col = 'A';

foreach($headers as $head) {
	$objPHPExcel->getActiveSheet()->setCellValue($col.$i,$head);
	$col++;
}

foreach($body as $key => $value) {
    $i++;
    $col = 'A';

    for($x = 0; $x < count($value); $x++) {
        $objPHPExcel->getActiveSheet()->setCellValue($col.$i,$value[$x]); $col++;
    }
}

$fileName = $category."-report-".date('Y-m-d');
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// We'll be outputting an excel file
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

// It will be called file.xls
header('Content-Disposition: attachment; filename="'.$fileName.'.xlsx"');

ob_get_clean();
// Write file to the browser
$objWriter->save('php://output');
exit();
