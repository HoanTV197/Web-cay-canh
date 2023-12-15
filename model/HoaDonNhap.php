<?php
class HoaDonNhap{
    private $MaHDN;
    private $NgayTao;
    private $TongTienHD;
    private $MaSoThue;
    private $GhiChu;
    private $PTThanhToan;
    private $GiamGiaHD;

    private $TrangThai;
    private $MaNV;
    private $MaNCC;
    public function getNgayTao(){
        return $this->NgayTao;
    }
    public function getTongTienHD(){
        return $this->TongTienHD;
    }
    public function getMaSoThue(){
        return $this->MaSoThue;
    }
    public function getGhiChu(){
        return $this->GhiChu;
    }
    public function getMaHDN(){
        return $this->MaHDN;
    }
    public function getPTThanhToan(){
        return $this->PTThanhToan;
    }
    public function getGiamGiaHD(){
        return $this->GiamGiaHD;
    }public function getTrangThai(){
        return $this->TrangThai;
    }
    public function getMaNV(){
        return $this->MaNV;
    }
    public function getMaNCC(){
        return $this->MaNCC;
    }
    public function __construct($MaHDN,$NgayTao,
    $TongTienHD,$MaSoThue,$GhiChu,$PTThanhToan,$GiamGiaHD,$TrangThai,$MaNV,$MaNCC){
        $this->MaHDN = $MaHDN;
        $this->NgayTao = $NgayTao;
        $this->TongTienHD = $TongTienHD;
        $this->MaSoThue = $MaSoThue;
        $this->GhiChu = $GhiChu;
        $this->PTThanhToan = $PTThanhToan;
        $this->GiamGiaHD=$GiamGiaHD;
        $this->TrangThai = $TrangThai;
        $this->MaNV = $MaNV;
        $this->MaNCC = $MaNCC;
    }

}
