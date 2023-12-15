<?php
include '../../controller/KhachHangController.php';
if(isset($_POST["maKH"])){
    $maKH = $_POST["maKH"];
    $kh = new KhachHangController();
    if($kh->deleteCustomer($maKH)){
        echo "Xóa thành công";
    }
    else{
        echo "Xóa thất bại";
    }
}
?>