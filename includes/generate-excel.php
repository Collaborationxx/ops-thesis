<?php
require_once('../plugins/PHPEXcel/Classes/PHPEXcel.php');
include(dirname(__FILE__).'/../config/db_connection.php');

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

echo '<pre>'; print_r($arr); exit;

//create new instance of PHPExcel
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator('Admin');
$objPHPExcel->getProperties()->setLastModifiedBy('Admin');
$objPHPExcel->getProperties()->setTitle('Test Excel');
$objPHPExcel->getProperties()->setSubject('Testing');

$i =1;
$col = 'A';
$headings = array('ID', 'Product ID','Qty', 'Stock');

foreach($headings as $heading) {
	$objPHPExcel->getActiveSheet()->setCellValue($col.$i,$heading);
	$col++;
}

foreach($arr as $index => $cell) {
    $i++;
    $col = 'A';
    $objPHPExcel->getActiveSheet()->setCellValue($col.$i,$cell['id']); $col++;
    $objPHPExcel->getActiveSheet()->setCellValue($col.$i,$cell['product_id']); $col++;
    $objPHPExcel->getActiveSheet()->setCellValue($col.$i,$cell['quantity']); $col++;
    $objPHPExcel->getActiveSheet()->setCellValue($col.$i,$cell['stock_date']); 

    
}


// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// We'll be outputting an excel file
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

// It will be called file.xls
header('Content-Disposition: attachment; filename="file.xlsx"');

ob_get_clean();
// Write file to the browser
$objWriter->save('php://output');
exit();
