<?php
require_once('../plugins/PHPEXcel/Classes/PHPEXcel.php');
include(dirname(__FILE__).'/../config/db_connection.php');

$query = "SELECT * FROM `invaentory` ";
$arr = array();
if ($result = mysqli_query($con, $query)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    /* free result set */
    mysqli_free_result($result);
}

//create new instance of PHPExcel
$objPHPExcel = new PHPExcel();
$objPHPExcel->getActiveSheet()->setTitle('List of Users');

$rowNumber = 1;
$col = 'A';
$headings = array('ID', 'Product ID','Qty', 'Stock');
foreach($headings as $heading) {
	$objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
	$col++;
}

$rowNumber = 2;
$col = 'A';
foreach($arr as $cell) {
    $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell); 
    $col++;
}
$rowNumber++;

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
