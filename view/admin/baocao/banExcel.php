<?php
include_once '../../database/DB.php';

$db = new DB();
$sql = "SELECT MONTH(hoadonban.NgayTao) AS thang,
SUM(chitiethdb.SoLuong) AS sl,
SUM(chitiethdb.SoLuong * sanpham.DonGiaBan) AS doanhthu
FROM
hoadonban
INNER JOIN chitiethdb
ON hoadonban.MaHDB = chitiethdb.MaHDB
INNER JOIN sanpham
ON chitiethdb.MaSP = sanpham.MaSP
GROUP BY
MONTH(hoadonban.NgayTao)";
$dt = $db->executeSQL($sql);
$tongDoanhThu = 0;
$doanhThu = array_fill(0, 13, 0);
$sl =  array_fill(0, 13, 0);
if ($dt->num_rows > 0) {
    while ($row = $dt->fetch_assoc()) {
        $doanhThu[$row['thang']] = $row["doanhthu"];
        $tongDoanhThu += $row["doanhthu"];
        $sl[$row["thang"]] = $row["sl"];
    }
}
$key = 4;
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('B2' , 'BÁO CÁO DOANH THU');
$objPHPExcel->getActiveSheet()->getStyle('B2' )->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(20); // Set font size to 12
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_RED));
$objPHPExcel->getActiveSheet()->getStyle('D18')->getFont()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_RED));
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width to 15
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(22); 
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30); 
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$key, 'Tháng')
    ->setCellValue('B'.$key, 'Số lượng')
    ->setCellValue('C'.$key, 'Doanh thu')
    ->setCellValue('D18', 'Tổng doanh thu:'. $tongDoanhThu);
    $objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('B4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('C4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A' . $key )->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('B' . $key )->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('C' . $key )->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('D18')->getFont()->setBold(true);
   

for ($i = 1; $i <= 12; $i++) {
    // Add some data
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . ($key + 2), ''.$i)
        ->setCellValue('B' . ($key + 2), ''.$sl[$i])
        ->setCellValue('C' . ($key + 2), ''.$doanhThu[$i]);
        $objPHPExcel->getActiveSheet()->getStyle('A' . ($key + 2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A' . ($key + 2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B' . ($key + 2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B' . ($key + 2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C' . ($key + 2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C' . ($key + 2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        
    $key++;
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('doanhthuban');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="doanhthuban.xlsx"');
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
