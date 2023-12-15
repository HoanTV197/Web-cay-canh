<?php

include_once '../../controller/XuatExcelController.php';
 //$currentPage=$_GET['page'];
//gọi đến controller
$kh = new XuatExcelController();
$khachhang = $kh->getAllCustomer(1);
// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
  ->setLastModifiedBy("Maarten Balliauw")
  ->setTitle("Office 2007 XLSX Test Document")
  ->setSubject("Office 2007 XLSX Test Document")
  ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
  ->setKeywords("office 2007 openxml php")
  ->setCategory("Test result file");
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('A1', 'Mã khách hàng')
  ->setCellValue('B1', 'Ảnh đại diện ')
  ->setCellValue('C1', 'Tên khách hàng')
  ->setCellValue('D1', 'Giới tính')
  ->setCellValue('E1', 'Email')
  ->setCellValue('F1', 'Số điện thoại')
  ->setCellValue('G1', 'Ngày sinh')
  ->setCellValue('H1', 'Địa chỉ')
  ->setCellValue('I1', 'Ghi chú');

// Miscellaneous glyphs, UTF-8
$key = 0;
foreach ($khachhang as $i) {
  //   // Add some data
  $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A' . ($key + 2), $i->getMaKH())
    ->setCellValue('B' . ($key + 2), $i->getAnhDaiDien())
    ->setCellValue('C' . ($key + 2), $i->getTenKH())
    ->setCellValue('D' . ($key + 2),  $i->getGioiTinh())
    ->setCellValue('E' . ($key + 2),  $i->getEmail())
    ->setCellValue('F' . ($key + 2), $i->getPhone())
    ->setCellValue('G' . ($key + 2),  $i->getNgaySinh())
    ->setCellValue('H' . ($key + 2),  $i->getDiaChi())
    ->setCellValue('I' . ($key + 2), $i->getGhiChu());
  $key++;
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('khachhang');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="khachhang.xlsx"');
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
