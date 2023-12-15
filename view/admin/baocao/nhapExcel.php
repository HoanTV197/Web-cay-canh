<?php
include_once '../../database/DB.php';

$db = new DB();
$sql = "SELECT
MONTH(hoadonnhap.NgayTao) AS thang,
SUM(chitiethdn.SoLuong) AS sl,
SUM(chitiethdn.SoLuong * sanpham.DonGiaNhap) AS doanhthu
FROM
hoadonnhap
INNER JOIN chitiethdn
ON hoadonnhap.MaHDN = chitiethdn.MaHDN
INNER JOIN sanpham
ON chitiethdn.MaSP = sanpham.MaSP
GROUP BY
MONTH(hoadonnhap.NgayTao)";
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
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tháng')
    ->setCellValue('B1', 'Số lượng')
    ->setCellValue('C1', 'Doanh thu')
    ->setCellValue('D1', 'Tổng doanh thu:'. $tongDoanhThu);

$key = 0;
for ($i = 1; $i < 12; $i++) {
    // Add some data
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . ($key + 2), ''.$i)
        ->setCellValue('B' . ($key + 2), ''.$sl[$i])
        ->setCellValue('C' . ($key + 2), ''.$doanhThu[$i]);

    $key++;
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('thongkenhap');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="thongkenhap.xlsx"');
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
