<?php

include_once '../../controller/NhaCungCapController.php';
if (isset($_POST['tenNCC'])) {
    // Lấy dữ liệu từ các trường nhập liệu của nhà cung cấp
    $TenNCC = $_POST['tenNCC'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $diaChi = $_POST['address'];
    $ghiChu = $_POST['ghiChu'];
    $ncc = new NhaCungCapController();
    $MaNCC = $ncc->autoMaNCC();
  
    //Kiểm tra xem dữ liệu đã nhập có hợp lệ hay không
    if ($TenNCC == '' || $email == '' || $phone == '') {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin nhà cung cấp.");</script></div>';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Email không hợp lệ.</div>';
    } else {
        // Thêm nhà cung cấp mới vào cơ sở dữ liệu
        $insert=$ncc->insertNCC($MaNCC, $TenNCC, $phone, $email, $diaChi, $ghiChu);
        if($insert){
            echo "<script>alert('thêm thành công');window.location='?admin=hienThiNCC&page=1';</script>";
        }
        else{
            echo "<script>alert('Thêm thất bại');</script>";

        }
      
    }
}
?>
<div class="content-wrapper">
    <form action="admin.php?admin=themNCC" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm nhà cung cấp</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu [Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiNCC&page=1" role="button">
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
                                    
                                    <label>Tên nhà cung cấp </label>
                                    <input type="text" class="form-control" name="tenNCC" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="number" class="form-control" name="phone" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-4">
                               
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input name="address" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea id="my-textarea" rows="5" cols="50" name="ghiChu">
                                    </textarea>
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