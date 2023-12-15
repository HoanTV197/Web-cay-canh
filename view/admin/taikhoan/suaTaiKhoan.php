<?php
include '../../controller/TaiKhoanController.php';
$username = $_GET['username'];
$tk = new TaiKhoanController();
$x = $nv->getStaff($username);
echo $x->getMaNV();
if (isset($_GET['username']) && isset($_GET['password'])) {
    // Lấy dữ liệu từ các trường nhập liệu của khách hàng
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loaiUser = $_POST['loaiUser'];
   if ($kq) {
        echo "<script>alert('Sửa thành công');</script>";

    } else {
        echo "<script>alert('Sửa không thành công');</script>";

    }
}
?>

<div class="content-wrapper">
    <form action="<?php echo 'admin.php?admin=suaNhanVien&username=' . $username;?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa nhân viên</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiNhanVien" role="button">
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
                                    <label>Username <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="username" style="width:100%" value='<?php echo $x->getUsername() ?>' readonly>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="password" style="width:100%" value='<?php echo $x->getUsername() ?>' >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Loại User <span class="maudo"></span></label>
                                    <input type="text" class="form-control" name="loaiUser" style="width:100%" value='<?php echo $x->getChucVu() ?>'>
                                    <div class="error" id="password_error"></div>
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