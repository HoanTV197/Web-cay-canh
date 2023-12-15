<?php
class ChiTietHDN{
    private $MaCTHDN;
   
    private $SoLuong;
    private $MaSP;
    private $MaHDN;
    public function getMaCTHDN(){
        return $this->MaCTHDN;
    }
   
    public function getSoLuong(){
        return $this->SoLuong;
    }
    public function getMaSP(){
        return $this->MaSP;
    }
    public function getMaHDN(){
        return $this->MaHDN;
    }
    public function __construct($MaHDN,$MaCTHDN,$MaSP,$SoLuong){
        $this->MaCTHDN = $MaCTHDN;
        $this->SoLuong = $SoLuong;
        $this->MaSP = $MaSP;
        $this->MaHDN = $MaHDN;
}
}
