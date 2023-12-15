<?php
class NhanVien{
    private $MaNV;
    private $TenNV;
    private $GioiTinh;
    private $phone;
    private $NgaySinh;
    private $DiaChi;
    private $AnhDaiDien;
    private $ChucVu;
    private $SoCCD;
    private $SoTaiKhoanNH;
    private $username;
    public function getMaNV(){
        return $this->MaNV;
    }
    public function getTenNV(){
        return $this->TenNV;
    }
    public function getGioiTinh(){
        return $this->GioiTinh;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getNgaySinh(){
        return $this->NgaySinh;
    }
    public function getDiaChi(){
        return $this->DiaChi;
    }
    public function getAnhDaiDien(){
        return $this->AnhDaiDien;
    }
    public function getSoCCD(){
        return $this->SoCCD;
    }
    public function getSoTaiKhoanNH(){
        return $this->SoTaiKhoanNH;
    }
    public function getChucVu(){
        return $this->ChucVu;
    }
    public function getUsername(){
        return $this->username;
    }
    public function __construct($MaNV,$TenNV,$GioiTinh, $phone, $NgaySinh,$DiaChi,
     $AnhDaiDien,
     $ChucVu,$SoCCD,$SoTaiKhoanNH, $username){
        $this->MaNV = $MaNV;
        $this->TenNV = $TenNV;
        $this->GioiTinh = $GioiTinh;
        $this->phone = $phone;
        $this->NgaySinh= $NgaySinh;
        $this->DiaChi = $DiaChi;
        $this->AnhDaiDien = $AnhDaiDien;
        $this->ChucVu = $ChucVu;
        $this->SoTaiKhoanNH = $SoTaiKhoanNH;
        $this->SoCCD = $SoCCD;
        $this->username = $username;
    }
}
