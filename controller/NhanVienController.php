<?php

include '../../database/DB.php';
include '../../model/NhanVien.php';
include_once  '../../model/HoaDonBan.php';

class NhanVienController{
    private $listStaff = [];
    public function getListStaff(){
        return $this->listStaff;
    }
     /*----------------Tạo mã nhân viên tự động--------------*/
    
     public function autoMaNV(){
         //khởi tạo database và kết nối
         $db = new DB();  
         //câu lện sql cần thực thi
        $sql = "SELECT * FROM nhanvien;";
        $result = $db->executeSQL($sql);
       
        if ($result->num_rows>=10) {
            $maNV="NV".($result->num_rows+1);
            return $maNV;
        }
        else{
            $maNV="NV0".($result->num_rows+1);
            return $maNV;
        }  
        
    }
     /*----------------Lấy 1 nhân viên--------------*/
     public function getStaff($maNV)
     {
         //khởi tạo database và kết nối
         $db = new DB();
         
         //câu lện sql cần thực thi
          $sql = "SELECT * FROM NhanVien WHERE MaNV='$maNV';";
           $result = $db->executeSQL($sql);
         
        //trả về 1 nhân viên với tham số là mã nhân viên
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                return new NhanVien(
                    $row["MaNV"],
                    $row["TenNV"],
                    $row["GioiTinh"],
                    $row["Phone"],
                    $row["NgaySinh"],
                    $row["DiaChi"],
                    $row["AnhDaiDien"],
                    $row["ChucVu"],
                    $row["SoCCCD"],   
                    $row["SoTaiKhoanNH"],    
                    $row["username"]        
                 );
                 
             }
         } else {
             echo "Không có nhân viên nào.";
            return false;
         }
       
         
        
     }
     /*----------------Lấy danh sách nhân viên--------------*/
    public function getAllStaff($page)
    {
       
        //khởi tạo database và kết nối
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page-1) * $record_page;
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM NhanVien LIMIT $numberPage, $record_page;";
          $result = $db->executeSQL($sql);
        
        //push các bản ghi vào list Nhân viên
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listStaff, new NhanVien(
                    $row["MaNV"],
                    $row["TenNV"],
                    $row["GioiTinh"],
                    $row["Phone"],
                    $row["NgaySinh"],
                    $row["DiaChi"],
                    $row["AnhDaiDien"],
                    $row["ChucVu"],
                    $row["SoCCCD"],   
                    $row["SoTaiKhoanNH"],    
                    $row["username"]       
                ));
                
            }
        } else {
            echo "Không có nhân viên nào.";
        }
      
         return $this->listStaff;
       
    }
     /*----------------Thêm nhân viên--------------*/
     public function insertStaff($MaNV,$TenNV, $phone, $NgaySinh,$GioiTinh,$DiaChi,
     $AnhDaiDien,
     $ChucVu,$SoCCD,$SoTaiKhoanNH, $username,$password,$loaiUser)  {
        $db = new DB();
        $sql = " INSERT INTO `user`(`username`, `password`, `LoaiUser`) VALUES ('$username','$password',$loaiUser); ";
        $db->executeSQL($sql);
        //." ".
        $sql1 =" INSERT INTO `nhanvien`(`MaNV`, `TenNV`, `Phone`, `NgaySinh`, `GioiTinh`, `ChucVu`, `DiaChi`, `SoCCCD`, `SoTaiKhoanNH`, `AnhDaiDien`, `username`) VALUES ('$MaNV','$TenNV',' $phone','$NgaySinh','$GioiTinh','$ChucVu','$DiaChi','$SoCCD','$SoTaiKhoanNH','$AnhDaiDien','$username');";
        $kq=$db->executeSQL($sql1);
        echo $sql +$sql1;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
       /*----------------Sửa nhân viên--------------*/
       public function editStaff($MaNV, $TenNV, $phone, $ngaySinh, $gioiTinh,$chucVu, $diaChi,$SoCCCD,$SoTaiKhoanNH, $AnhDaiDien, $username){
        $db = new DB();
        
        $sql="UPDATE `nhanvien` SET 
        `TenNV`='$TenNV',
        `Phone`='$phone',
        `NgaySinh`='$ngaySinh',
        `GioiTinh`='$gioiTinh',
        `ChucVu`='$chucVu',
        `DiaChi`='$diaChi',
        `SoCCCD`='$SoCCCD',
        `SoTaiKhoanNH`='$SoTaiKhoanNH',
        `AnhDaiDien`='$AnhDaiDien' WHERE `MaNV`='$MaNV' and `username`='$username';";
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
      /*----------------Xóa nhân viên--------------*/
      public function deleteStaff($maNV){
        $db = new DB();
        $sql="DELETE FROM `NhanVien` WHERE MaNV='$maNV';";
        echo $sql;
        $kq=$db->executeSQL($sql);
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
     public function listHDB($page)
     {
         $db = new DB();
         $record_page = 10;
         $numberPage = ($page - 1) * $record_page;
         //câu lện sql cần thực thi
         $sql = "SELECT * FROM HoaDonBan LIMIT $numberPage, $record_page;";
         $result = $db->executeSQL($sql);
         $listHDB = [];
         //push các bản ghi vào list hóa đơn bán
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
 
                 array_push($listHDB, new HoaDonBan(
                     $row["MaHDB"],
                     $row["NgayTao"],
                     $row["TongTienHD"],
                     $row["MaSoThue"],
                     $row["GhiChu"],
                     $row["PTThanhToan"],
                     $row["GiamGiaHD"],
                     $row["TrangThai"],
                     $row["MaNV"],
                     $row["MaKH"]
                 ));
             }
         } else {
             echo "Không có hóa đơn bán nào.";
         }
         return $listHDB;
     }
      
    
}
