<?php
include '../../controller/KhachHangController.php';
$MaKH = $_GET['MaKH'];
$kh = new KhachHangController();
$x = $kh->getCustomer($MaKH);

if (isset($_POST['tenKH'])) {
    // Lấy dữ liệu từ các trường nhập liệu của nhân viên
    $TenKH = $_POST['tenKH'];
    $phone = $_POST['phone'];
    $ngaySinh = $_POST['date'];
    $diaChi = $_POST['diaChi'];
    $email = $_POST['email'];
    $ghiChu = $_POST['ghiChu'];
    $username = $x->getUsername();
    
    $AnhDaiDien = $_FILES['img']['name'];
    $gioiTinh= $_POST['gender'];
  
    $kq = $kh->editCustomer($x->getMaKH(),$TenKH,$email,$phone,$ngaySinh,$diaChi,$AnhDaiDien,'ghi chú',$username,$gioiTinh);
    if ($kq) {
        echo "<script>alert('Sửa thành công');window.location='?admin=hienThiKhachHang&page=1';</script>";

    } else {
        echo "<script>alert('Sửa không thành công');window.location='?admin=hienThiKhachHang&page=1';</script>";

    }
}
?>

<div class="content-wrapper">
    <form action="<?php echo '?admin=suaKhachHang&MaKH=' . $x->getMaKH();?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa khách hàng</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiKhachHang&page=1" role="button">
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
                                    <label>Tên Khách hàng </label>
                                    <input type="text" class="form-control" name="tenKH" style="width:100%" value="<?php echo $x->getTenKH();?>" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" class="form-control" name="username" style="width:100%"  readonly>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="email" class="form-control" name="email" style="width:100%"  value="<?php echo $x->getEmail();?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>phone </label>
                                    <input type="number" class="form-control" name="phone" style="width:100%"  value="<?php echo $x->getPhone();?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input name="date" class="form-control" type="date"  value="<?php echo $x->getNgaySinh();?>">
                                </div>
                                <div class="form-group">
                                    <label>Giới tính: </label>
                                   
                                    <input type="radio" name="gender"  value="Nam" <?php echo '' . ($x->getGioiTinh() == 'Nam' ? 'checked' : ''); ?>><label> Nam</label>
                                    <input type="radio" name="gender"  value="Nữ" <?php echo '' . ($x->getGioiTinh() == 'Nữ' ? 'checked' : ''); ?>><label> Nữ</label>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input name="diaChi" class="form-control" type="text" value="<?php echo $x->getDiaChi();?>">
                                </div>
                               
                                <div class="form-group">
                                    <label>Hình đại diện</label>
                                    <input type="file" id="image_list" name="img" required style="width: 100%" >
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