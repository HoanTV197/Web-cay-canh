<?php
class HoaDonBan{
    private $MaHDB;
    private $NgayTao;
    private $TongTienHD;
    private $MaSoThue;
    private $GhiChu;
    private $PTThanhToan;
    private $GiamGiaHD;

    private $TrangThai;
    private $MaNV;
    private $MaKH;
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
    public function getMaHDB(){
        return $this->MaHDB;
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
    public function getMaKH(){
        return $this->MaKH;
    }
    public function __construct($MaHDB,$NgayTao,
    $TongTienHD,$MaSoThue,$GhiChu,$PTThanhToan,$GiamGiaHD,$TrangThai,$MaNV,$MaKH){
        $this->MaHDB = $MaHDB;
        $this->NgayTao = $NgayTao;
        $this->TongTienHD = $TongTienHD;
        $this->MaSoThue = $MaSoThue;
        $this->GhiChu = $GhiChu;
        $this->PTThanhToan = $PTThanhToan;
        $this->GiamGiaHD=$GiamGiaHD;
        $this->TrangThai = $TrangThai;
        $this->MaNV = $MaNV;
        $this->MaKH = $MaKH;
    }

}
