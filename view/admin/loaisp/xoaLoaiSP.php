<?php
include '../../controller/LoaiSPController.php';
$loai = new LoaiSPController();
if(isset($_GET['MaLoai'])){
    $kq=$loai->deleteLoai($_GET['MaLoai']);
    if($kq){
        echo "<script>alert('Xóa thành công');window.location='?admin=hienThiLoai&page=1';</script>";
   }
   else{
    echo "<script>alert('Xóa không thành công');window.location='?admin=hienThiLoai&page=1';</script>";
   }
}

?>