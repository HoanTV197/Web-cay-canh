<?php
class SanPham
{
    private $MaSP;
    private $TenSP;
    private $ThoiGianBH;
    private $MoTaSP;
    private $AnhDaiDien;
    private $DonGiaBan;
    private $NgayNhap;
    private $DonGiaNhap;
    private $donViTinh;
    private $MaLoai;
    private $GhiChu;

    public function getMaSP()
    {
        return $this->MaSP;
    }
    public function getDonViTinh()
    {
        return $this->donViTinh;
    }

    public function getTenSP()
    {
        return $this->TenSP;
    }

    public function getThoiGianBH()
    {
        return $this->ThoiGianBH;
    }

    public function getMoTaSP()
    {
        return $this->MoTaSP;
    }

    public function getAnhDaiDien()
    {
        return $this->AnhDaiDien;
    }

    public function getDonGiaBan()
    {
        return $this->DonGiaBan;
    }

    public function getNgayNhap()
    {
        return $this->NgayNhap;
    }

    public function getDonGiaNhap()
    {
        return $this->DonGiaNhap;
    }

    public function getMaLoai()
    {
        return $this->MaLoai;
    }

    public function getGhiChu()
    {
        return $this->GhiChu;
    }
     // Hàm tạo (constructor) với tham số đối số
     public function __construct($MaSP, $TenSP, $ThoiGianBH, $MoTaSP, $AnhDaiDien, $DonGiaBan, $NgayNhap, $DonGiaNhap, $MaLoai, $GhiChu,$donViTinh)
     {
         $this->MaSP = $MaSP;
         $this->TenSP = $TenSP;
         $this->ThoiGianBH = $ThoiGianBH;
         $this->MoTaSP = $MoTaSP;
         $this->AnhDaiDien = $AnhDaiDien;
         $this->DonGiaBan = $DonGiaBan;
         $this->NgayNhap = $NgayNhap;
         $this->DonGiaNhap = $DonGiaNhap;
         $this->MaLoai = $MaLoai;
         $this->GhiChu = $GhiChu;
         $this->donViTinh = $donViTinh;
     }
}
?>

