<?php

include '../../database/DB.php';
include '../../model/TinTuc.php';
class TinTucController{
    private $listNews = [];
    private $listNews1 = [];
    public function getListNews(){
        return $this->listNews;
    }
     /*----------------Tạo mã tin tức tự động--------------*/
    
     public function autoMaTT(){
         //khởi tạo database và kết nối
         $db = new DB();  
         //câu lện sql cần thực thi
        $sql = "SELECT * FROM TinTuc;";
        $result = $db->executeSQL($sql);
       
        if ($result->num_rows>=10) {
            $MaTT="TT".($result->num_rows+1);
            return $MaTT;
        }
        else{
            $MaTT="TT0".($result->num_rows+1);
            return $MaTT;
        }  
        
    }
    public function sumPage(){
        //khởi tạo database và kết nối
        $db = new DB();  
        //câu lện sql cần thực thi
       $sql = "SELECT * FROM tintuc;";
       $result = $db->executeSQL($sql);
        return $result->num_rows;
       
   }
     /*----------------Lấy 1 Tin Tức--------------*/
     public function getNews($maTT)
     {
         //khởi tạo database và kết nối
         $db = new DB();
         //câu lện sql cần thực thi
        $sql = "SELECT * FROM TinTuc WHERE MaTinTuc='$maTT';";
        $result = $db->executeSQL($sql);
         
        //trả về 1 tin tức với tham số là mã tin tức
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                return new TinTuc(
                    $row["MaTinTuc"],
                    $row["TieuDe"],
                    $row["NoiDung"],
                    $row["MoTaNgan"],
                    $row["Anh"]   ,
                    $row["NgayTao"]
                 );
                 
             }
         } else {
             echo "Không có tin tức nào.";
            return false;
         }
       
         
        
     }
     /*----------------Lấy danh sách tin tức--------------*/
    public function getAllNews($page)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page-1) * $record_page;
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM TinTuc LIMIT $numberPage, $record_page;";
      
          $result = $db->executeSQL($sql);
        
        //push các bản ghi vào list tin tức
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listNews1, new TinTuc(
                    $row["MaTinTuc"],
                    $row["TieuDe"],
                    $row["NoiDung"],
                    $row["MoTaNgan"],
                    $row["Anh"]   ,
                    $row["NgayTao"]       
                ));
            }
        } 
         return $this->listNews1;
    }
    public function getAllNews1()
    {
       
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM TinTuc ;";
          $result = $db->executeSQL($sql);
        
        //push các bản ghi vào list tin tức
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listNews, new TinTuc(
                    $row["MaTinTuc"],
                    $row["TieuDe"],
                    $row["NoiDung"],
                    $row["MoTaNgan"],
                    $row["Anh"]   ,
                    $row["NgayTao"]
                        
                ));
                
            }
        } 
      
         return $this->listNews;
       
    }
     /*----------------Thêm Tin tức--------------*/
     public function insertNews($MaTT,$TieuDe,$NoiDung,$moTaNgan,$Anh,$NgayTao)  {
        $db = new DB();
        $sql = "INSERT INTO `tintuc`(`MaTinTuc`, `TieuDe`, `NoiDung`, `moTaNgan`, `NgayTao`, `Anh`) VALUES
         ('$MaTT','$TieuDe','$NoiDung','$moTaNgan','$NgayTao','$Anh');";
        $kq=$db->executeSQL($sql);
        
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
       /*----------------Sửa tin tức--------------*/
       public function editNews($MaTT,$TieuDe,$NoiDung,$moTaNgan,$Anh,$ngayTao){
        $db = new DB();
        
        $sql="UPDATE `tintuc` SET 
        `TieuDe`='$TieuDe',
        `NoiDung`='$NoiDung',
        `MoTaNgan`='$moTaNgan',
        `NgayTao`='$ngayTao',
        `Anh`='$Anh'
         WHERE `MaTinTuc`='$MaTT';";
        $kq=$db->executeSQL($sql);
        echo $sql;
       if($kq){
            return true;
       }
       else{
            return false;
       }
     }
      /*----------------Xóa tin tức--------------*/
      public function deleteNews($MaTT){
        $db = new DB();
        $sql="DELETE FROM `TinTuc` WHERE MaTinTuc='$MaTT';";
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
