<?php
include_once '../../controller/KhachHangController.php';
if (isset($_POST['tenKH'])) {
    // Lấy dữ liệu từ các trường nhập liệu của khách hàng
    $tenKH = $_POST['tenKH'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ngaySinh = $_POST['date'];
    $diaChi = $_POST['address'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $hinhDaiDien = $_FILES['img']['name'];
    
    $kh = new KhachHangController();
    $maKH = $kh->autoMaKH();
    
    //Kiểm tra xem dữ liệu đã nhập có hợp lệ hay không
    if ($tenKH == '' || $email == '' || $phone == '') {
        echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin khách hàng.</div>';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Email không hợp lệ.</div>';
    } else {
        // Thêm khách hàng mới vào cơ sở dữ liệu
      
        $insert=$kh->insertCustomer( $maKH, $tenKH, $email, $phone, $ngaySinh, $diaChi, $hinhDaiDien, '', $username, $gender);
        
        if($insert){
            echo "<script>alert('Thêm thành công');</script>";

        }
        else{
            echo "<script>alert('Thêm thất bại');</script>";

        }
       // Chuyển hướng đến trang danh sách khách hàng
      
      // header('Location: index.php?admin=hienThiKhachHang');
    }
}
?>
<div class="content-wrapper">
    <form action="admin.php?admin=themKhachHang" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm khách hàng</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu [Thêm]
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
                                    
                                    <label>Tên Khách hàng <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="tenKH" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Username <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="username" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="maudo">(*)</span></label>
                                    <input type="email" class="form-control" name="email" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>phone <span class="maudo">(*)</span></label>
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