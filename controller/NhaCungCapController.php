<?php

include_once '../../database/DB.php';
include_once '../../model/NhaCungCap.php';
include_once '../../model/SanPham.php';
class NhaCungCapController{
    private $listNCC = [];
    public function getListNCC(){
        return $this->listNCC;
    }
     /*----------------Tạo mã Nhà cung cấp tự động--------------*/
    
     public function autoMaNCC(){
         //khởi tạo database và kết nối
         $db = new DB();  
         //câu lện sql cần thực thi
        $sql = "SELECT * FROM NhaCungCap;";
        $result = $db->executeSQL($sql);
       
        if ($result->num_rows>=10) {
            $MaNCC="NCC".($result->num_rows+1);
            return $MaNCC;
        }
        else{
            $MaNCC="NCC0".($result->num_rows+1);
            return $MaNCC;
        }  
        
    }
    public function sumPage(){
        //khởi tạo database và kết nối
        $db = new DB();  
        //câu lện sql cần thực thi
       $sql = "SELECT * FROM NhaCungCap;";
       $result = $db->executeSQL($sql);
        return $result->num_rows;
       
   }
     /*----------------Lấy 1 Nhà cung cấp--------------*/
     public function getNCC($MaNCC)
     {
         //khởi tạo database và kết nối
         $db = new DB();
         //câu lện sql cần thực thi
        $sql = "SELECT * FROM NhaCungCap WHERE MaNCC='$MaNCC';";
        $result = $db->executeSQL($sql);
         
        //trả về 1 Nhà cung cấp với tham số là mã Nhà cung cấp
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                return new NhaCungCap(
                    $row["MaNCC"],
                    $row["TenNCC"],
                    $row["phone"],
                    $row["email"],
                    $row["diaChi"],
                    $row["ghiChu"]       
                 );
                 
             }
         } else {
             echo "Không có Nhà cung cấp nào.";
            return false;
         }
       
         
        
     }
       /*----------------Lấy danh sách Nhà cung cấp--------------*/
    public function getAllNCC1()
    {
       
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM nhacungcap;";
          $result = $db->executeSQL($sql);
        echo $sql;
        //push các bản ghi vào list Nhà cung cấp
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listNCC, new NhaCungCap(
                    $row["MaNCC"],
                    $row["TenNCC"],
                    $row["phone"],
                    $row["email"],
                    $row["diaChi"],
                    $row["ghiChu"]  
                ));
                
            }
        } else {
            echo "Không có Nhà cung cấp nào.";
        }
      
         return $this->listNCC;
       
    }
     /*----------------Lấy danh sách Nhà cung cấp--------------*/
    public function getAllNCC($page)
    {
       
        //khởi tạo database và kết nối
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page-1) * $record_page;
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM NhaCungCap LIMIT $numberPage, $record_page;";
          $result = $db->executeSQL($sql);
        
        //push các bản ghi vào list Nhà cung cấp
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listNCC, new NhaCungCap(
                    $row["MaNCC"],
                    $row["TenNCC"],
                    $row["phone"],
                    $row["email"],
                    $row["diaChi"],
                    $row["ghiChu"]  
                ));
                
            }
        } else {
            echo "Không có Nhà cung cấp nào.";
        }
      
         return $this->listNCC;
       
    }
     /*----------------Thêm Nhà cung cấp--------------*/
     public function insertNCC($MaNCC,$TenNCC,$phone,$email,$diaChi,$ghiChu)  {
        $db = new DB();
        $sql = "INSERT INTO `nhacungcap`(`MaNCC`, `TenNCC`, `phone`, `email`, `diaChi`, `ghiChu`) VALUES 
        ('$MaNCC','$TenNCC','$phone','$email','$diaChi','$ghiChu');";
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
       /*----------------Sửa Nhà cung cấp--------------*/
       public function editNCC($MaNCC,$TenNCC,$phone,$email,$diaChi,$ghiChu){
        $db = new DB();
        
        $sql="UPDATE `nhacungcap` SET
        `TenNCC`='$TenNCC',
        `phone`='$phone',
        `diaChi`='$diaChi',
        `email`='$email',
        `ghiChu`='$ghiChu' 
         WHERE `MaNCC`='$MaNCC';";
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
      /*----------------Xóa Nhà cung cấp--------------*/
      public function deleteNCC($MaNCC){
        $db = new DB();
        $sql="DELETE FROM `NhaCungCap` WHERE MaNCC='$MaNCC';";
        echo $sql;
        $kq=$db->executeSQL($sql);
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
     public function listSanPham()
     {
         //khởi tạo database và kết nối
         $db = new DB();
        
         //câu lện sql cần thực thi
         $sql = "SELECT * FROM sanpham;";
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
