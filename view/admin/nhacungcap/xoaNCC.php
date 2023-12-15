<?php
include '../../controller/NhaCungCapController.php';
$ncc = new NhaCungCapController();
if(isset($_GET['MaNCC'])){
    echo $_GET['MaNCC'];
    $kq=$ncc->deleteNCC($_GET['MaNCC']);
    if($kq){
        echo "<script>alert('Xóa thành công');window.location='?admin=hienThiNCC&page=1';</script>";
   }
   else{
    echo "<script>alert('Xóa không thành công');</script>";
   }
}

?>