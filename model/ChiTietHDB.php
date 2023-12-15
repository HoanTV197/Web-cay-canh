<?php
class ChiTietHDB{
    private $MaCTHDB;
   
    private $SoLuong;
    private $MaSP;
    private $MaHDB;
    public function getMaCTHDB(){
        return $this->MaCTHDB;
    }
   
    public function getSoLuong(){
        return $this->SoLuong;
    }
    public function getMaSP(){
        return $this->MaSP;
    }
    public function getMaHDB(){
        return $this->MaHDB;
    }
    public function __construct($MaHDB,$MaCTHDB,$MaSP,$SoLuong){
        $this->MaCTHDB = $MaCTHDB;
        $this->SoLuong = $SoLuong;
        $this->MaSP = $MaSP;
        $this->MaHDB = $MaHDB;
}
}
