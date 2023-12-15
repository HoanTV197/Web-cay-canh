<?php
include '../../controller/NhanVienController.php';
$nv = new NhanVienController();
if(isset($_GET['MaNV'])){
    echo $_GET['MaNV'];
    $kq=$nv->deleteStaff($_GET['MaNV']);
    if($kq){
        echo "<script>alert('Xóa thành công');window.location='?admin=hienThiNhanVien&page=1';</script>";
   }
   else{
    echo "<script>alert('Xóa không thành công');</script>";
   }
}

?>