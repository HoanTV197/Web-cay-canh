<?php
include '../../controller/NhanVienController.php';
if (isset($_POST['TenNV'])) {
    // Lấy dữ liệu từ các trường nhập liệu của khách hàng
    $TenNV = $_POST['TenNV'];
  //  $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ngaySinh = $_POST['date'];
    $diaChi = $_POST['address'];
    $chucVu = $_POST['chucVu'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $AnhDaiDien = $_FILES['img']['name'];
    $nv = new NhanVienController();
    $maNV=$nv->autoMaNV();
    $kq=$nv->insertStaff($maNV, $TenNV, $phone, $ngaySinh, $gender, $diaChi, $AnhDaiDien, $chucVu, '', '', $username, $password, 1);
   if($kq){
        echo "Thêm thành công";
   }
   else{
    echo "Không thành công";
   }
}
?>
<div class="content-wrapper">
    <form action="admin.php?admin=themNhanVien" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm nhân viên</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu [Thêm]
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
                                    <input type="text" class="form-control" name="TenNV" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Username <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="username" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu <span class="maudo">(*)</span></label>
                                    <input type="password" class="form-control" name="password" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ <span class="maudo"></span></label>
                                    <input type="text" class="form-control" name="chucVu" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Phone <span class="maudo">(*)</span></label>
                                    <input type="number" class="form-control" name="phone" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input name="date" class="form-control" type="date">
                                </div>
                                <div class="form-group">
                                    <label>Giới tính: </label>
                                   
                                    <input type="radio" name="gender"  value="Nam"><label> Nam</label>
                                    <input type="radio" name="gender"  value="Nữ"><label> Nữ</label>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input name="address" class="form-control" type="text">
                                </div>
                               
                                <div class="form-group">
                                    <label>Hình đại diện</label>
                                    <input type="file" id="image_list" name="img" required style="width: 100%">
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