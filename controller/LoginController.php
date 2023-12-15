<?php
include_once './database/DB.php';
class LoginController{
    public function login($username,$password){
        $db = new DB();
        $sql = "SELECT * FROM `User` WHERE username='$username' and password='$password';";
       
       $user= $db->executeSQL($sql);
       if($user->num_rows>0){
            return $user->fetch_assoc();
       }
       else{
        return false;
       }
        
    }
    public function logout(){

    }
}
?>