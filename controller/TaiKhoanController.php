<?php

include '../../database/DB.php';
include '../../model/User.php';
class TaiKhoanController
{
    private $listUser = [];
    public function getListUser($page)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page-1) * $record_page;
        //câu lện sql cần thực thi
         $sql = "SELECT * FROM User LIMIT $numberPage, $record_page;";
          $result = $db->executeSQL($sql);
        
        //push các bản ghi vào listUser
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               
                array_push($this->listUser, new User(
                    $row["username"],    
                    $row["password"],
                    $row["LoaiUser"]
                ));
                
            }
        } else {
            echo "Không có nhân viên nào.";
        }
      
         return $this->listUser;

    }
    public function editUser($username,$password,$loaiUser){
        $db = new DB();
        $sql = "UPDATE `user` SET 
        `password`='$password',
        `LoaiUser`='$loaiUser' WHERE 
        `username`='$username';";
        $db->executeSQL($sql);
    }
}
?>