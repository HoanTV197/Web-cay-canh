<?php
class NhaCungCap{
    private $MaNCC;
    private $TenNCC;
    private $phone;
    private $email;
    private $diaChi;
    private $ghiChu;
    public function __construct($MaNCC,$TenNCC,$phone,$email,$diaChi,$ghiChu){
        $this->MaNCC = $MaNCC;
        $this->TenNCC = $TenNCC;
        $this->phone = $phone;
        $this->email = $email;
        $this->diaChi = $diaChi;
        $this->ghiChu = $ghiChu;
    }
    public function getMaNCC(){
        return $this->MaNCC;

    }
    public function getTenNCC(){
        return $this->TenNCC;
    }
    public function getPhone(){
        return $this->phone;

    }
    public function getEmail(){
        return $this->email;
    }
    public function getDiaChi(){
        return $this->diaChi;
    }
    public function getGhiChu(){
        return $this->ghiChu;
    }
}
?>