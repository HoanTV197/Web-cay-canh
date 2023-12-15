<?php
class User{
    private $username;
    private $password;
    private $loaiUser;
    // Getters
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getLoaiUser() {
        return $this->loaiUser;
    }
    public function __construct($username,$password,$loaiUser){
        $this->username = $username;
        $this->password = $password;
        $this->loaiUser = $loaiUser;
    }
}
