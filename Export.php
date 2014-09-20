<?php

/* 
 * The MIT License
 *
 * Copyright 2014 s4if.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

require_once 'vendor/autoload.php';
require_once 'app/core/Config.php';



define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
//use PHPExcel;

$conf = new Config();
$db = $conf->getDB();
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$qrString = $_POST['query'];
$query = $db->prepare($qrString);
try{

    $query->execute();
    $data = $query->fetchAll();

}catch(PDOException $e){

    die($e->getMessage());

}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$rowCount = 1;
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'No');
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Kelas'); 
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, 'Jurusan');
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, 'Paralel');
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, 'Jumlah');
$rowCount++;
foreach ($data as $row){
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $rowCount-1);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row[0]);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row[1]); 
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row[2]);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, ($row[3]==null)?0:$row[3]);
    $rowCount++;
}

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$_POST['filename'].'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;