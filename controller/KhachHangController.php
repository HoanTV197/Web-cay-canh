<?php

include '../../database/DB.php';
include '../../model/KhachHang.php';
include_once '../../model/SanPham.php';
class KhachHangController{
    private $listCustomer = [];
    public function getListCustomer(){
        return $this->listCustomer;
    }
     /*----------------Tạo mã khách hàng tự động--------------*/
    public function autoMaKH(){
         //khởi tạo database và kết nối
         $db = new DB();  
         //câu lện sql cần thực thi
        $sql = "SELECT * FROM khachhang;";
        $result = $db->executeSQL($sql);
        if ($result->num_rows>=10) {
            $maKH="KH".($result->num_rows+1);
            return $maKH;
        }
        else{
            $maKH="KH0".($result->num_rows+1);
            return $maKH;
        }  
        
    }
     /*----------------Lấy 1 khách hàng--------------*/
     public function getCustomer($maKH)
     {
         //khởi tạo database và kết nối
         $db = new DB();
         
         //câu lện sql cần thực thi
          $sql = "SELECT * FROM khachhang WHERE MaKH='$maKH';";
           $result = $db->executeSQL($sql);
         
        //trả về 1 khách hàng với tham số là mã khách hàng
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) { 
                 return new KhachHang(
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
                 );
                 
             }
             
         } 
         else {
             echo "Không có khách hàng nào.";
            return false;
         } 
     }
     /*----------------Lấy danh sách khách hàng--------------*/
    public function getAllCustomer($page)
    {
       
        //khởi tạo database và kết nối
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page-1) * $record_page;
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM khachhang LIMIT $numberPage, $record_page;";
          $result = $db->executeSQL($sql);
        
        //push các bản ghi vào listProduct
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               
                array_push($this->listCustomer, new KhachHang(
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
      
         return $this->listCustomer;
       
    }
     /*----------------Thêm khách hàng--------------*/
     public function insertCustomer( $MaKH, $TenKH, $email, $phone, $ngaySinh, $diaChi, $AnhDaiDien, $ghiChu, $username, $gioiTinh)
     {
        $db = new DB();
        $sql = "INSERT INTO `user`(`username`, `password`, `LoaiUser`) VALUES ('$username','password','loaiUser'); ";
        $sql = "INSERT INTO `khachhang`(`MaKH`, `TenKH`, `email`, `Phone`, `GioiTinh`, `NgaySinh`, `DiaChi`, `AnhDaiDien`, `GhiChu`, `username`) 
        VALUES ('$MaKH','$TenKH','$email','$phone ','$gioiTinh','$ngaySinh',' $diaChi','$AnhDaiDien','$ghiChu','$username');";
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
       /*----------------Sửa khách hàng--------------*/
       public function editCustomer($MaKH, $TenKH, $email, $phone, $ngaySinh, $diaChi, $AnhDaiDien, $ghiChu, $username, $gioiTinh){
        $db = new DB();
        
        $sql="UPDATE `khachhang` SET 
        `TenKH`='$TenKH',
        `email`='$email',
        `Phone`='$phone ',
        `GioiTinh`='$gioiTinh',
        `NgaySinh`='$ngaySinh',
        `DiaChi`='$diaChi',
        `AnhDaiDien`='$AnhDaiDien',
        `GhiChu`='',
        `username`='$username' WHERE MaKH='$MaKH';";
        
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
      /*----------------Xóa khách hàng--------------*/
      public function deleteCustomer($maKH){
        $db = new DB();
        $sql="DELETE FROM `khachhang` WHERE MaKH='$maKH';";
        
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
     public function listSanPham($page)
     {
         //khởi tạo database và kết nối
         $db = new DB();
         $record_page = 8;
         $numberPage = ($page - 1) * $record_page;
         //câu lện sql cần thực thi
         $sql = "SELECT * FROM sanpham LIMIT $numberPage, $record_page;";
         $result = $db->executeSQL($sql);
        $listProduct = [];
         //push các bản ghi vào listProduct
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 array_push($listProduct, new SanPham(
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
 
         return $listProduct;
     }
}
?>