<?php
include_once '../../database/DB.php';
include_once  '../../model/SanPham.php';
include_once  '../../model/KhachHang.php';
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

}
?>
