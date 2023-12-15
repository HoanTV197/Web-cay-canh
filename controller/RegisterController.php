<?php
include_once './database/DB.php';
class RegisterController {
    public function checkUsernameExists($username) {
        $db = new DB();
        $sql = "SELECT * FROM `user` WHERE username='$username';";
        $result = $db->executeSQL($sql);
        
        if ($result->num_rows > 0) {
            return true; // Tên người dùng đã tồn tại
        } else {
            return false; // Tên người dùng không tồn tại
        }
    }
    public function checkEmailExists($email) {
        $db = new DB();
        $sql = "SELECT * FROM `user` WHERE email='$email';";
        $result = $db->executeSQL($sql);
        
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false; 
        }
    }
}
?>