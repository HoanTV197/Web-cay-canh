<?php
include_once '../../controller/TinTucController.php';
 $currentPage=$_GET['page'];
//gọi đến controller
$tt = new TinTucController();
 $listNews = $tt->getAllNews($currentPage);
// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
  ->setLastModifiedBy("Maarten Balliauw")
  ->setTitle("Office 2007 XLSX Test Document")
  ->setSubject("Office 2007 XLSX Test Document")
  ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
  ->setKeywords("office 2007 openxml php")
  ->setCategory("Test result file");

  $objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('D2' , 'DANH SÁCH TIN TỨC');
  $objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setSize(20); // Set font size to 12
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_RED));
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width to 15
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(22); 
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40); 
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40); 
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30); 

$key = 4;
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('A'.$key, 'Mã tin tức')
  ->setCellValue('B'.$key, 'Ảnh ')
  ->setCellValue('C'.$key, 'Tiêu đề')
  ->setCellValue('D'.$key, 'Nội dung')
  ->setCellValue('E'.$key, 'Mô tả tin tức')
  ->setCellValue('F'.$key, 'Ngày đăng');
  $objPHPExcel->getActiveSheet()->getStyle('A' . $key )->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('B' . $key )->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('C' . $key )->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('D' . $key )->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('E' . $key )->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('F' . $key )->getFont()->setBold(true);

  $objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('B4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('C4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('D4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('E4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
   
// Miscellaneous glyphs, UTF-8

foreach ($listNews as $i) {
  $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A' . ($key + 2), "".$i->getMaTinTuc())
    ->setCellValue('B' . ($key + 2),"". $i->getAnh())
    ->setCellValue('C' . ($key + 2),"". $i->getTieuDe())
    ->setCellValue('D' . ($key + 2), "".$i->getNoiDung())
    ->setCellValue('E' . ($key + 2), "".$i->getmoTaNgan())
    ->setCellValue('F' . ($key + 2),"". $i->getNgayTao());
    
  $key++;
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('tintuc');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tintuc.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
