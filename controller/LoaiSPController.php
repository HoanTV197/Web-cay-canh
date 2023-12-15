<?php

include '../../database/DB.php';
include '../../model/LoaiSP.php';
class LoaiSPController{
    private $listLoai = [];
    public function getListLoai(){
        return $this->listLoai;
    }
     /*----------------Tạo mã loai tự động--------------*/
    
     public function autoMaLoaiSP(){
         //khởi tạo database và kết nối
         $db = new DB();  
         //câu lện sql cần thực thi
        $sql = "SELECT * FROM LoaiSP;";
        $result = $db->executeSQL($sql);
       
        if ($result->num_rows>=10) {
            $maL="Loai0".($result->num_rows+1);
            return $maL;
        }
        else{
            $maL="Loai0".($result->num_rows+1);
            return $maL;
        }  
        
    }
    public function sumPage(){
        //khởi tạo database và kết nối
        $db = new DB();  
        //câu lện sql cần thực thi
       $sql = "SELECT * FROM LoaiSP;";
       $result = $db->executeSQL($sql);
        return $result->num_rows;
       
   }
     /*----------------Lấy 1 Loại--------------*/
     public function getLoai($maL)
     {
         //khởi tạo database và kết nối
         $db = new DB();
         
         //câu lện sql cần thực thi
          $sql = "SELECT * FROM LoaiSP WHERE MaLoai='$maL';";
           $result = $db->executeSQL($sql);
         
        //trả về 1 loại sản phẩm với tham số là mã loại
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                return new LoaiSP(
                    $row["MaLoai"],
                    $row["Loai"]
                       
                 );
                 
             }
         } else {
             echo "Không có loại nào.";
            return false;
         }
       
         
        
     }
     /*----------------Lấy danh sách Loại sản phẩm--------------*/
    public function getAllLoai($page)
    {
       
        //khởi tạo database và kết nối
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page-1) * $record_page;
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM LoaiSP LIMIT $numberPage, $record_page;";
          $result = $db->executeSQL($sql);
        
        //push các bản ghi vào list Loai
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listLoai, new LoaiSP(
                    $row["MaLoai"],
                    $row["Loai"]
                        
                ));
                
            }
        } else {
            echo "Không có tin tức nào.";
        }
      
         return $this->listLoai;
       
    }
     /*----------------Thêm Loại--------------*/
     public function insertLoai($maL,$loai,$ghiChu)  {
        $db = new DB();
        $sql = " INSERT INTO `loaisp`(`MaLoai`, `Loai`, `GhiChu`) VALUES ('$maL','$loai','$ghiChu'); ";
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
       /*----------------Sửa Loại--------------*/
       public function editLoai($maL,$loai,$ghiChu ){
        $db = new DB();
        
        $sql="UPDATE `loaisp` SET `Loai`='$loai',`GhiChu`='$ghiChu' WHERE MaLoai='$maL';";
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
      /*----------------Xóa loại--------------*/
      public function deleteLoai($maL){
        $db = new DB();
        $sql="DELETE FROM `LoaiSP` WHERE MaLoai='$maL';";
        echo $sql;
        $kq=$db->executeSQL($sql);
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
     
}
