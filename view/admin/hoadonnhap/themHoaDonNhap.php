<?php
include '../../controller/HoaDonNhapController.php';
$username = $_SESSION['username'];
$hdn = new HoaDonNhapController();
// Đặt múi giờ mặc định thành Hà Nội
date_default_timezone_set('Asia/Ho_Chi_Minh');
$NgayTao = date('Y-m-d H:i:s');
// Kiểm tra phương thức gửi dữ liệu

if (isset($_POST['mst'])) {
    // Kiểm tra xem trường input có dữ liệu hay không
    $MaSoThue = $_POST['mst'];
    $PTThanhToan = $_POST['pttt'];
    $GhiChu = $_POST['ghiChu'];
    $MaNCC = $_POST['ncc'];
    $MaSP = $_POST['tenSP'];
    $SoLuong = $_POST['sl'];
    $MaNV =$hdn->getMaNV($username) ;
   
    $TongTienHD = $SoLuong * $hdn->getDG($MaSP);
    $MaHDN = $hdn->autoMaHDN();
    $MaCTHDN = $hdn->autoMaCTHDN();
    // Xử lý dữ liệu
    $hdn->insertHDN($MaHDN, $NgayTao, $TongTienHD, $MaSoThue, $PTThanhToan, 'Hoàn thành', 0, $GhiChu, $MaNCC, $MaNV);
    $kq = $hdn->insertCTHDN($MaHDN, $MaCTHDN, $MaSP, $SoLuong);
    if ($kq) {
        header("Location: admin.php?admin=hienThiHoaDonNhap&MaHDN=$MaHDN"); // Chuyển hướng kèm Mã HDN
        exit; // Kết thúc xử lý tại đây để đảm bảo chuyển hướng ngay lập tức
    } else {
        echo "<script>alert('Cập nhật hóa đơn thất bại!');</script>";
    }
    
}

?>
<style>
    select {
        padding: 5px;
    }
</style>

<div class="content-wrapper">
    <form action="admin.php?admin=themHoaDonNhap" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm hóa đơn nhập</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu [Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiHoaDonNhap&page=1" role="button">
                    Thoát
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ngày tạo :</label>
                                    <?php
                                    // In ra kết quả
                                    echo $NgayTao; // 2023-11-03 14:00:23
                                    ?>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mã số thuế </label>
                                    <input type="text" class="form-control" name="mst" style="width:100%">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Phương thức thanh toán</label><br>
                                    <select name="pttt">
                                        <option value="Chuyển khoản">Chuyển khoản</option>
                                        <option value="Tiền mặt">Tiền mặt</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú <span class="maudo"></span></label><br>
                                    <textarea name="ghiChu" rows="5" cols="40" placeholder="Nhập mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tên nhà cung cấp </label><br>
                                    <select name="ncc" class="form-control">
                                        <option value="">[--Chọn nhà cung cấp--]</option>
                                        <?php
                                        $ncc = $hdn->getAllNCC();
                                        foreach ($ncc as $i) {
                                            $str = '<option value="' . $i->getMaNCC() . '">' . $i->getTenNCC() . '</option>';
                                            echo $str;
                                        }
                                        ?>

                                    </select>
                                </div>


                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Tên sản phẩm </label><br>

                                    <select name="tenSP" class="form-control">
                                        <option value="">[--Tên sản phẩm--]</option>
                                        <?php
                                        $sp = $hdn->getAllSP();
                                        foreach ($sp as $i) {
                                            $str = '<option value="' . $i->getMaSP() . '">' . $i->getTenSP() . '</option>';
                                            echo $str;
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label><br>
                                    <input type="number" name="sl" min="1" max="10000" value="2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </form>
    <!-- /.content -->
    </form>
</div>