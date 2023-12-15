<?php
include_once '../../controller/TinTucController.php';
$tt = new TinTucController();
$maTT = $_GET['MaTinTuc'];
$tin=$tt->getNews($maTT);
$kq=$tt->deleteNews($maTT);
    if($kq){
        echo "<script>alert('xóa thành công');window.location='?admin=hienThiTinTuc&page=1'</script>";
    }
    else{
        echo "<script>alert('xóa thất bại');window.location='?admin=hienThiTinTuc&page=1'</script>";
    }
                                 
?>