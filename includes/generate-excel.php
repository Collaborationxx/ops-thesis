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

//array of style
$sideBorders = array(
    'font' => array(
        'bold' => false,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'borders' => array(
         'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
        ),
    )
);

$topBorder = array(
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
    ->mergeCells('B2:'.$rangeTo.'2')
    ->mergeCells('B3:'.$rangeTo.'3')
    ->mergeCells('B4:'.$rangeTo.'4');

//set value and fort size
$objPHPExcel->getActiveSheet()
    ->getCell('B2')
    ->setValue('MJ JACOBE TRADING')
    ->getStyle('B2')->getFont()->setSize(16);

$objPHPExcel->getActiveSheet()
    ->getCell('B3')
    ->setValue($category.' Report')
    ->getStyle('B3')->getFont()->setSize(18);

$objPHPExcel->getActiveSheet()
    ->getCell('B4')
    ->setValue(date('F-d-Y'))
    ->getStyle('B4')->getFont()->setSize(12);

$objPHPExcel->getActiveSheet()->getStyle('B2:'.$rangeTo.'2')->applyFromArray($topBorder);
$objPHPExcel->getActiveSheet()->getStyle('B3:'.$rangeTo.'3')->applyFromArray($sideBorders);
$objPHPExcel->getActiveSheet()->getStyle('B4:'.$rangeTo.'4')->applyFromArray($sideBorders);


$i = 5;
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