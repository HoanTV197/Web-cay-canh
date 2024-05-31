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
    /* CSS nâng cao cho form nhập hóa đơn */

.content-wrapper {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Chọn font chữ hiện đại */
  background-color: #f4f4f4; /* Nền xám nhạt */
}

form {
  max-width: auto;
  margin: 20px auto;
  padding: 30px;
  background-color: white;
  border-radius: 12px; /* Bo góc lớn hơn */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
}

h1 {
  text-align: center;
  margin-bottom: 30px;
  color: #333; /* Màu xám đậm cho tiêu đề */
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
  color: #555; /* Màu xám cho nhãn */
}

input[type="text"],
input[type="number"],
textarea,
select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ddd; /* Viền xám nhạt */
  border-radius: 6px; /* Bo góc tròn hơn */
  box-sizing: border-box;
  transition: border-color 0.3s; /* Hiệu ứng chuyển màu viền khi focus */
}

input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus,
select:focus {
  outline: none;
  border-color: #007bff; /* Màu xanh dương khi focus */
}

/* Nút */
.btn-primary {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 6px; /* Bo góc lớn hơn */
  cursor: pointer;
  font-weight: bold;
  transition: all 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà */
}

.btn-primary:hover {
  background-color: #0056b3;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Bóng đổ khi hover */
  transform: translateY(-2px); /* Nâng nút lên khi hover */
}

/* Căn chỉnh nút */
.breadcrumb {
  display: flex;
  justify-content: flex-end;
  margin-top: 20px;
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