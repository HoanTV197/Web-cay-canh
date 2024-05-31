<?php
include '../../controller/SanPhamController.php';

// Kiểm tra nếu mã sản phẩm (MaSP) được truyền qua URL
if (isset($_GET['MaSP'])) {
    $maSP = $_GET['MaSP'];
    $sp = new SanPhamController();
    
    // Gọi hàm deleteProduct để xóa sản phẩm
    $result = $sp->deleteProduct($maSP);
    
    // Kiểm tra kết quả và thông báo cho người dùng
    if ($result) {
        echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='?admin=hienThiSanPham';</script>";
    } else {
        echo "<script>alert('Xóa sản phẩm thất bại! Sản phẩm có thể đang được sử dụng trong hóa đơn.'); window.location.href='?admin=hienThiSanPham';</script>";
    }
} else {
    echo "<script>alert('Không tìm thấy mã sản phẩm!'); window.location.href='?admin=hienThiSanPham';</script>";
}
?>
