<?php
include_once '../../controller/NhanVienController.php';
 $currentPage=$_GET['page'];
//   // //gọi đến controller
    $HDB = new NhanVienController();
    $listHDB = $HDB->listHDB($currentPage);
// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
  ->setLastModifiedBy("Maarten Balliauw")
  ->setTitle("Office 2007 XLSX Test Document")
  ->setSubject("Office 2007 XLSX Test Document")
  ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
  ->setKeywords("office 2007 openxml php")
  ->setCategory("Test result file");

$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('D2' , 'Danh sách hóa đơn đã hoàn thành');
// Add some data
$key = 5;
$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('A'. $key, 'Mã hóa đơn bán')
  ->setCellValue('B'. $key, 'Ngày tạo ')
  ->setCellValue('C'. $key, 'Tổng tiền')
  ->setCellValue('D'. $key, 'Mã số thuế')
  ->setCellValue('E'. $key, 'Ghi chú')
  ->setCellValue('F'. $key, 'Phương thức thanh toán')
  ->setCellValue('G'. $key, 'Giảm giá ')
  ->setCellValue('H'. $key, 'Trạng thái');
  
foreach ($listHDB as $i) {
  // Add some data
  if ($i->getTrangThai() == '2') {
    $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue('A' . ($key + 1), $i->getMaHDB())
      ->setCellValue('B' . ($key + 1), $i->getNgayTao())
      ->setCellValue('C' . ($key + 1), $i->getTongTienHD())
      ->setCellValue('D' . ($key + 1), $i->getGhiChu())
      ->setCellValue('E' . ($key + 1), $i->getMaSoThue())
      ->setCellValue('F' . ($key + 1), $i->getPTThanhToan())
      ->setCellValue('G' . ($key + 1), $i->getGiamGiaHD())
      ->setCellValue('H' . ($key + 1), 'Hoàn Thành');
    $key++;
  }
}
// Miscellaneous glyphs, UTF-8



// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('hoadonban');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="hoadonban.xlsx"');
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
