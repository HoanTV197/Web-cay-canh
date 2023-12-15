<?php
include_once '../../controller/SanPhamController.php';
$sp = new SanPhamController();
$page = $_GET['MaSP'];
$kq=$sp->deleteProduct($page);
if ($kq) {
    echo "<script>alert('Xóa thành công');window.location='?admin=hienThiSanPham&page=1';</script>";
}
else{
    echo "<script>alert('Xóa thất bại');window.location='?admin=hienThiSanPham&page=1';</script>";
}
?>