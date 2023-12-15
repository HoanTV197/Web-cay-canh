<?php
 include '../../controller/XuatExcelController.php';
$currentPage=$_GET['page'];
//gọi đến controller
$sanpham = new XuatExcelController();
$listSanPham = $sanpham->listSanPham($currentPage);
// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
  ->setLastModifiedBy("Maarten Balliauw")
  ->setTitle("Office 2007 XLSX Test Document")
  ->setSubject("Office 2007 XLSX Test Document")
  ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
  ->setKeywords("office 2007 openxml php")
  ->setCategory("Test result file");

$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('D2' , 'Danh sách sản phẩm');
// Add some data
 $key = 5;
$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue('A'. $key, 'Mã Sản Phẩm')
  ->setCellValue('B'. $key, 'Ảnh đại diện')
  ->setCellValue('C'. $key, 'Tên Sản Phẩm')
  ->setCellValue('D'. $key, 'Ngày nhập')
  ->setCellValue('E'. $key, 'Đơn giá nhập')
  ->setCellValue('F'. $key, 'Đơn giá bán')
  ->setCellValue('G'. $key, 'Đơn vị tính')
  ->setCellValue('H'. $key, 'Thời gian bảo hành')
  ->setCellValue('I'. $key, 'Mô tả sản phẩm');

 foreach ($listSanPham as $i) {
//   // Add some data
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'. ($key + 2) ,''. $i->getMaSP())
->setCellValue('B' . ($key + 2),''. $i->getAnhDaiDien())
->setCellValue('C' . ($key + 2),''. $i->getTenSP())
->setCellValue('D' . ($key + 2),''. $i->getNgayNhap())
->setCellValue('E' . ($key + 2),''. $i->getDonGiaNhap())
->setCellValue('F' . ($key + 2),''. $i->getDonGiaBan())
->setCellValue('G' . ($key + 2),''. $i->getDonViTinh())
->setCellValue('H' . ($key + 2),''. $i->getThoiGianBH())
->setCellValue('I' . ($key + 2),''. $i->getMoTaSP());
 $key++; 
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('sanpham');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="sanpham.xlsx"');
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
