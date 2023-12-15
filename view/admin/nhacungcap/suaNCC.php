<?php
include '../../controller/NhaCungCapController.php';
$MaNCC = $_GET['MaNCC'];
$ncc = new NhaCungCapController();
$x = $ncc->getNCC($MaNCC);

if (isset($_POST['tenNCC'])) {
    // Lấy dữ liệu từ các trường nhập liệu của NCC
    $TenNCC = $_POST['tenNCC'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $diaChi = $_POST['diaChi'];
    $ghichu= $_POST['ghiChu'];
    $kq = $ncc->editNCC($x->getMaNCC(), $TenNCC, $email, $phone,  $diaChi,$ghichu );
    if ($kq) {
        echo "<script>alert('Sửa thành công');window.location='?admin=hienThiNCC&page=1';</script>";

    } else {
        echo "<script>alert('Sửa không thành công');window.location='?admin=hienThiNCC&page=1';</script>";

    }
}
?>

<div class="content-wrapper">
    <form action="<?php echo 'admin.php?admin=suaNCC&MaNCC=' . $x->getMaNCC();?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa nhà cung cấp</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu
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
                                    <input type="text" class="form-control" name="tenNCC" style="width:100%" value="<?php echo $x->getTenNCC();?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" style="width:100%" value="<?php echo $x->getEmail();?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="number" class="form-control" name="phone" style="width:100%" value="<?php echo $x->getPhone();?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-4">
                               
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input name="diaChi" class="form-control" type="text" value="<?php echo $x->getDiaChi();?>">
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea id="my-textarea" rows="5" cols="50" name="ghiChu" value="<?php echo $x->getGhiChu();?>">
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