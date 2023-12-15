<?php
class TinTuc
{
    private $maTinTuc;
    private $tieuDe;
    private $noiDung;
    private $anh;
    private $moTaNgan;
    private $ngayTao;
    public function getMaTinTuc()
    {
        return $this->maTinTuc;
    }
    public function getNgayTao()
    {
        return $this->ngayTao;
    }
    public function setMaTinTuc($maTinTuc)
    {
        $this->maTinTuc = $maTinTuc;
    }

    public function getTieuDe()
    {
        return $this->tieuDe;
    }

    public function setTieuDe($tieuDe)
    {
        $this->tieuDe = $tieuDe;
    }

    public function getNoiDung()
    {
        return $this->noiDung;
    }

    public function setNoiDung($noiDung)
    {
        $this->noiDung = $noiDung;
    }

    public function getAnh()
    {
        return $this->anh;
    }

    public function setAnh($anh)
    {
        $this->anh = $anh;
    }

    public function getmoTaNgan()
    {
        return $this->moTaNgan;
    }

    public function setmoTaNgan($moTaNgan)
    {
        $this->moTaNgan = $moTaNgan;
    }
    public function __construct($maTinTuc,$tieuDe,$noiDung,$moTaNgan,$anh,$ngayTao){
        $this->maTinTuc = $maTinTuc;
        $this->tieuDe = $tieuDe;
        $this->noiDung = $noiDung;
        $this->anh = $anh;
        $this->moTaNgan = $moTaNgan;
        $this->ngayTao = $ngayTao;
    }
}
