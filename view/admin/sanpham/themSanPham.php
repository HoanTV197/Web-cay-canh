<?php
include_once '../../controller/SanPhamController.php';
$sanpham = new SanPhamController();
$loai = $sanpham->getLoaiSP();

if (isset($_POST['tenSP'])) {
    $TenSP = $_POST['tenSP'];
    $MaLoai = $_POST['loai'];
    $MoTaSP = $_POST['moTa'];
    $NgayNhap = $_POST['ngayNhap'];
    $DonGiaNhap = $_POST['giaNhap'];
    $DonGiaBan = $_POST['giaBan'];
    $GhiChu = $_POST['ghiChu'];
    $ThoiGianBH = $_POST['tg'];
    $donViTinh = 'cây'; // Thêm giá trị mặc định cho đơn vị tính nếu cần
    
    // Xử lý việc tải lên ảnh
    $AnhDaiDien = $_FILES['img']['name'];
    $target_dir = "../../assets/public/images/products/";
    $target_file = $target_dir . basename($AnhDaiDien);

    // Kiểm tra nếu ảnh được tải lên thành công
    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
        $kq = $sanpham->insertProduct($MaLoai, $TenSP, $DonGiaBan, $DonGiaNhap, $NgayNhap, $ThoiGianBH, $MoTaSP, $donViTinh, $AnhDaiDien, $GhiChu);
        if ($kq) {
            echo "<script>alert('Thêm thành công');window.location='?admin=hienThiSanPham&page=1';</script>";
        } else {
            echo "<script>alert('Thêm không thành công');window.location='?admin=hienThiSanPham&page=1';</script>";
        }
    } else {
        echo "<script>alert('Tải lên ảnh thất bại.');</script>";
    }
}
?>

<div class="content-wrapper">
    <form action="?admin=themSanPham" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm sản phẩm</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiSanPham&page=1" role="button">
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
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Tên sản phẩm </label>
                                    <input type="text" class="form-control" name="tenSP" style="width:100%" placeholder="Tên sản phẩm" required>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <label>Loại sản phẩm</label>
                                                <select name="loai" class="form-control" required>
                                                    <option value="">[--Chọn loại sản phẩm--]</option>
                                                    <?php
                                                        foreach($loai as $i){
                                                        echo "<option value='".$i->getMaLoai()."'>".$i->getTenLoai()."</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <div class="error" id="password_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="moTa" class="form-control" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ngày nhập</label>
                                    <input name="ngayNhap" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Đơn giá nhập</label>
                                    <input name="giaNhap" class="form-control" type="number" min="0" step="1" max="1000000000" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Đơn giá bán</label>
                                    <input name="giaBan" class="form-control" type="number" min="0" step="1" max="1000000000" required>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Thời gian bảo hành</label>
                                    <input name="tg" class="form-control" type="number" min="0" step="1" max="1000000000" required>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú </label>
                                    <input name="ghiChu" class="form-control" type="text">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Thêm hình ảnh sản phẩm</label>
                                    <input type="file" id="image_list" name="img" required>
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
</div>

<style>
    /* Nút bo góc tròn và hiệu ứng hover */
.btn-primary {
    border-radius: 25px; /* Điều chỉnh giá trị để bo góc nhiều hay ít */
    transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Hiệu ứng mượt mà */
}

.btn-primary:hover {
    background-color: #0056b3; /* Màu nền khi hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng đổ khi hover */
}

/* Bảng */
.table {
    border-radius: 10px; /* Bo góc cho bảng */
    overflow: hidden; /* Giúp bo góc hoạt động tốt hơn */
}

.table th, .table td {
    border-top: none; /* Loại bỏ viền trên của các ô */
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="date"],
textarea,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px; /* Bo góc ô nhập liệu */
    box-sizing: border-box; /* Đảm bảo padding và border không làm tăng kích thước ô */
}

input[type="file"] {
    margin-bottom: 15px;
}



</style>