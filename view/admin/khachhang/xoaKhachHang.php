<?php
// Start output buffering
ob_start();

// Include necessary files
include_once '../../controller/KhachHangController.php';

// Check if MaKH is set in the URL
if (isset($_GET['MaKH'])) {
    // Get the MaKH from the URL
    $maKH = $_GET['MaKH'];

    // Create an instance of the KhachHangController
    $kh = new KhachHangController();

    // Call the delete method
    $kh->deleteCustomer($maKH);

    // Redirect back to the customer list page
    echo "<script type='text/javascript'>alert('Xóa khách hàng thành công')</script>";
    echo "<script type='text/javascript'>window.location.href = '?admin=hienThiKhachHang&page=1';</script>";
    exit();
} else {
    // If MaKH is not set, redirect to the customer list page
    echo "<script type='text/javascript'>alert('Không tìm thấy mã khách hàng')</script>";
    echo "<script type='text/javascript'>window.location.href = '?admin=hienThiKhachHang&page=1';</script>";
    exit();
}

// End output buffering and flush output
ob_end_flush();
?>
