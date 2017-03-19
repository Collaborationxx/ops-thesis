<?php
require_once('../plugins/PHPEXcel/Classes/PHPEXcel.php');
include(dirname(__FILE__).'/../config/db_connection.php');

$headers = json_decode($_POST['headers'],true);
$body = json_decode($_POST['body'], true);
$category = $_POST['reportName'];

//set column range base on array count
$alphabet = range('A', 'Z');
$index = count($headers);
$rangeTo = $alphabet[$index];

//create new instance of PHPExcel
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()
    ->setCreator('Admin')
    ->setLastModifiedBy('Admin')
    ->setTitle($category.' Report')
    ->setSubject('Report');

//array of style
$styleArray = array(
    'font' => array(
        'bold' => false,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        ),
         'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        ),
    )
);

//merge cell
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('B2:'.$rangeTo.'2');

//set value and fort size
$objPHPExcel->getActiveSheet()
    ->getCell('B2')
    ->setValue($category.' Report')
    ->getStyle('B2')->getFont()->setSize(18);


$objPHPExcel->getActiveSheet()->getStyle('B2:'.$rangeTo.'2')->applyFromArray($styleArray);

$i =3;
$col = 'B';

foreach($headers as $head) {
    $objPHPExcel->getActiveSheet()->setCellValue($col.$i,$head);
    $objPHPExcel->getActiveSheet()->setCellValue($col.$i,strtoupper($head));
    $objPHPExcel->getActiveSheet()->getStyle($col.$i)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle($col.$i)->getFont()->setBold(true);

    $col++;
}

foreach($body as $key => $value) {
    $i++;
    $col = 'B';

    for($x = 0; $x < count($value); $x++) {
        $objPHPExcel->getActiveSheet()
            ->setCellValue($col.$i,$value[$x])
            ->getStyle($col.$i)->applyFromArray($styleArray);

        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);

        $col++;

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