<?php
include '../../controller/NhanVienController.php';
$MaNV = $_GET['MaNV'];
$nv = new NhanVienController();
$x = $nv->getStaff($MaNV);
echo $x->getMaNV();
if (isset($_POST['TenNV'])) {
    // Lấy dữ liệu từ các trường nhập liệu của khách hàng
    $TenNV = $_POST['TenNV'];
    $phone = $_POST['phone'];
    $ngaySinh = $_POST['date'];
    $diaChi = $_POST['address'];
    $chucVu = $_POST['chucVu'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $AnhDaiDien = $_FILES['img']['name'];
    $gioiTinh= $_POST['gender'];
    $maNV = $nv->autoMaNV();
    $kq = $nv->editStaff($x->getMaNV(), $TenNV, $phone, $ngaySinh, $gioiTinh, $chucVu, $diaChi, ' ', ' ', $AnhDaiDien, $username);
    if ($kq) {
        echo "<script>alert('Sửa thành công');;window.location='?admin=hienThiNhanVien&page=1';</script>";

    } else {
        echo "<script>alert('Sửa không thành công');;window.location='?admin=hienThiNhanVien&page=1';</script>";

    }
}
?>

<div class="content-wrapper">
    <form action="<?php echo 'admin.php?admin=suaNhanVien&MaNV=' . $x->getMaNV();?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa nhân viên</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiNhanVien&page=1" role="button">
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

                                    <label>Tên Nhân Viên <span class="maudo">(*)</span></label>

                                    <input type="text" class="form-control" name="TenNV" style="width:100%" value='<?php echo $x->getTenNV() ?>'>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Username <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="username" style="width:100%" value='<?php echo $x->getUsername() ?>' readonly>
                                    <div class="error" id="password_error"></div>
                                </div>

                                <div class="form-group">
                                    <label>Chức vụ <span class="maudo"></span></label>
                                    <input type="text" class="form-control" name="chucVu" style="width:100%" value='<?php echo $x->getChucVu() ?>'>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Phone <span class="maudo">(*)</span></label>
                                    <input type="number" class="form-control" name="phone" style="width:100%" value='<?php echo $x->getPhone() ?>'>
                                    <div class="error" id="password_error"></div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input name="date" class="form-control" type="date" value='<?php echo $x->getNgaySinh() ?>'>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính: </label>
                        
                                    <input type="radio" name="gender" value="Nam" <?php echo '' . ($x->getGioiTinh() == 'Nam' ? 'checked' : ''); ?>><label> Nam</label>
                                    <input type="radio" name="gender" value="Nữ" <?php echo '' . ($x->getGioiTinh() == 'Nữ' ? 'checked' : ''); ?>><label> Nữ</label>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input name="address" class="form-control" type="text" value='<?php echo $x->getDiaChi() ?>'>
                                </div>

                                <div class="form-group">
                                    <label>Hình đại diện</label>
                                    <input type="file" id="image_list" name="img" required style="width: 100%" value='<?php echo $x->getAnhDaiDien(); ?>'>
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