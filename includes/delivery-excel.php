<?php
require_once('../plugins/PHPEXcel/Classes/PHPEXcel.php');
include(dirname(__FILE__).'/../config/db_connection.php');

$headers = json_decode($_POST['headers'],true);
$body = json_decode($_POST['body'], true);
$category = $_POST['reportName'];

// echo '<pre>'; print_r($headers);
// echo '<pre>'; print_r($body);
// cho $category;
// exit;

//create new instance of PHPExcel
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()
    ->setCreator('Admin')
    ->setLastModifiedBy('Admin')
    ->setTitle($category)
    ->setSubject('Delivery');

//array of style
$styleArray = array(
    'font' => array(
        'bold' => true,
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
    ->mergeCells('B2:F2');

//set value and fort size
$objPHPExcel->getActiveSheet()
    ->getCell('B2')
    ->setValue($category)
    ->getStyle('B2')->getFont()->setSize(18);


$objPHPExcel->getActiveSheet()->getStyle('B2:F2')->applyFromArray($styleArray);

//set column width
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(35);


//loop through array to write table headerSS
$i = 3;
$col = 'B';
foreach($headers as $head) {
	$objPHPExcel->getActiveSheet()->setCellValue($col.$i,$head);
    $objPHPExcel->getActiveSheet()->getStyle($col.$i)->applyFromArray($styleArray);

	$col++;
}

//loop through body[] to write table contents
foreach($body as $key => $value) {
    $i++;
    $details = implode(",",$value['details']);

    $objPHPExcel->getActiveSheet()
        ->setCellValue('B'.$i,$value['count'])
        ->getStyle('B'.$i)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()
        ->setCellValue('C'.$i,$value['customer_name'])
        ->getStyle('C'.$i)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()
        ->setCellValue('D'.$i,$details)
        ->getStyle('D'.$i)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()
        ->setCellValue('E'.$i,$value['date'])
        ->getStyle('E'.$i)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()
        ->setCellValue('F'.$i,$value['shipAdd'])
        ->getStyle('F'.$i)->applyFromArray($styleArray);


    $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setWrapText(true);
    
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
