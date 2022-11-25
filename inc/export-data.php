<?php



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if( isset( $_POST['download'] ) ){
    downloadSheet();
}


function downloadSheet(){

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !');
    $sheet->setCellValue('B1', 'Hello World !');
    $sheet->setCellValue('C1', 'Hello World !');

    $writer = new Xlsx($spreadsheet);

    $writer->save('test.xlsx');
}
