<?php
include_once '../../database/DB.php';
include_once  '../../model/SanPham.php';
include_once  '../../model/KhachHang.php';
include_once  '../../assets/libs/PHPExcel.php';

class XuatExcelController
{
    public function listSanPham($page)
    {

         //khởi tạo database và kết nối
         $db = new DB();
         $record_page = 8;
         $numberPage = ($page - 1) * $record_page;
         //câu lện sql cần thực thi
         $sql = "SELECT * FROM sanpham LIMIT $numberPage, $record_page;";
         $result = $db->executeSQL($sql);
        $list = [];
         //push các bản ghi vào listProduct
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 array_push($list, new SanPham(
                     $row["MaSP"],
                     $row["TenSP"],
                     $row["ThoiGianBH"],
                     $row["MoTaSP"],
                     $row["AnhDaiDien"],
                     $row["DonGiaBan"],
                     $row["NgayNhap"],
                     $row["DonGiaNhap"],
                     $row["MaLoai"],
                     $row["GhiChu"],
                     $row["donViTinh"]
                 ));
             }
         } else {
             echo "Không có sản phẩm nào.";
         }
 
         return $list;
    }
    public function getAllCustomer($page)
    {
       
        //khởi tạo database và kết nối
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page-1) * $record_page;
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM khachhang LIMIT $numberPage, $record_page;";
          $result = $db->executeSQL($sql);
        $listCustomer = [];
        //push các bản ghi vào listProduct
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               
                array_push($listCustomer, new KhachHang(
                    $row["MaKH"],
                    $row["TenKH"],
                    $row["email"],
                    $row["Phone"],
                    $row["NgaySinh"],
                    $row["DiaChi"],
                    $row["AnhDaiDien"],
                    $row["GhiChu"],    
                    $row["username"] ,
                    $row["GioiTinh"]   
                ));
                
            }
        } else {
            echo "Không có khách hàng nào.";
        }
      
         return $listCustomer;
       
    }

    public function xuatExcelSanPham() {
        $db = new DB();
        $sql = "SELECT * FROM sanpham";
        $result = $db->executeSQL($sql);
        $listSanPham = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // ... (tạo đối tượng SanPham và thêm vào $listSanPham)
            }
        }

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $activeSheet = $objPHPExcel->getActiveSheet();

        // Tạo tiêu đề cột
        $activeSheet->setCellValue('A1', 'Mã SP');
        $activeSheet->setCellValue('B1', 'Tên SP');
        $activeSheet->setCellValue('C1', 'Thời gian BH');
        // ... (các cột khác)

        // Điền dữ liệu vào các dòng
        $rowIndex = 2;
        foreach ($listSanPham as $sanPham) {
            $activeSheet->setCellValue('A' . $rowIndex, $sanPham->getMaSP());
            $activeSheet->setCellValue('B' . $rowIndex, $sanPham->getTenSP());
            $activeSheet->setCellValue('C' . $rowIndex, $sanPham->getThoiGianBH());
            // ... (các cột khác)
            $rowIndex++;
        }

        // Cấu hình header để tải file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="danh_sach_san_pham.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}
?>
