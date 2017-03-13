<?php

require_once('plugins/PHPEXcel/Classes/PHPEXcel.php');
include('includes/functions.php');

    if(function_exists('finfo_open')){
        echo ' function exist!</br>';
    } else {
        echo 'function not found</br>';
    }

    echo paymentStatus(1);

    echo '</br>==========================================</br>';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


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


?>