<?php
// Start output buffering
ob_start();
// xóa tài khoản 
include_once '../../controller/TaiKhoanController.php';
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $tk = new TaiKhoanController();
    $tk->deleteUser($username);
    echo "<script type='text/javascript'>alert('Xóa tài khoản thành công')</script>";
    echo "<script type='text/javascript'>window.location.href = '?admin=hienThiTaiKhoan&page=1';</script>";
    exit();
} else {
    echo "<script type='text/javascript'>alert('Không tìm thấy tài khoản')</script>";
    echo "<script type='text/javascript'>window.location.href = '?admin=hienThiTaiKhoan&page=1';</script>";
    exit();
}
?>