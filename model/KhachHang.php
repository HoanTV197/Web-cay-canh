<?php
class KhachHang{
    private $MaKH;
    private $TenKH;
    private $email;
    private $phone;
    private $ngaySinh;
    private $diaChi;
    private $AnhDaiDien;
    private $gioiTinh;
    private $GhiChu;
    private $username;
    public function getMaKH(){
        return $this->MaKH;
    }
    public function getTenKH(){
        return $this->TenKH;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getNgaySinh(){
        return $this->ngaySinh;
    }
    public function getDiaChi(){
        return $this->diaChi;
    }
    public function getAnhDaiDien(){
        return $this->AnhDaiDien;
    }
    public function getGhiChu(){
        return $this->GhiChu;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getGioiTinh(){
        return $this->gioiTinh;
    }
    public function __construct($MaKH,$TenKH,$email, $phone, $ngaySinh,$diaChi,
     $AnhDaiDien,
     $GhiChu, $username,$gioiTinh){
        $this->MaKH = $MaKH;
        $this->TenKH = $TenKH;
        $this->email=$email;
        $this->phone = $phone;
        $this->ngaySinh= $ngaySinh;
        $this->diaChi = $diaChi;
        $this->AnhDaiDien = $AnhDaiDien;
        $this->GhiChu = $GhiChu;
        $this->username = $username;
        $this->gioiTinh = $gioiTinh;
    }
    public function printProperties()
    {
        echo "Mã khách hàng: {$this->MaKH}\n";
        echo "Tên khách hàng: {$this->TenKH}\n";
        echo "Email: {$this->email}\n";
        echo "Phone: {$this->phone}\n";
        echo "Ngày sinh: {$this->ngaySinh}\n";
        echo "Địa chỉ: {$this->diaChi}\n";
        echo "Ảnh đại diện: {$this->AnhDaiDien}\n";
        echo "Giới tính: {$this->gioiTinh}\n";
        echo "Ghi chú: {$this->GhiChu}\n";
        echo "Username: {$this->username}\n";
    }
}
