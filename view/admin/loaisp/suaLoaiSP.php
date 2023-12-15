<?php
include '../../controller/LoaiSPController.php';
$MaLoai = $_GET['MaLoai'];
$nv = new LoaiSpController();
$x = $nv->getLoai($MaLoai);

if (isset($_POST['tenLoai'])) {
    // Lấy dữ liệu từ các trường nhập liệu của khách hàng
    $TenLoai = $_POST['tenLoai'];
    $ghichu = $_POST['ghiChu'];
   
    $kq = $nv->editLoai($x->getMaLoai(), $TenLoai, $ghichu);
    if ($kq) {
        echo "<script>alert('Sửa thành công');window.location='?admin=hienThiLoai&page=1';</script>";

    } else {
        echo "<script>alert('Sửa không thành công');window.location='?admin=hienThiLoai&page=1';</script>";

    }
}
?>

<div class="content-wrapper">
    <form action="<?php echo 'admin.php?admin=suaLoaiSP&MaLoai=' . $x->getMaLoai();?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa Loại Sản Phẩm</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiLoaiSP&page=1" role="button">
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

                                <div class="form-group">
                                    <label>Tên loại </label>
                                    <input type="text" class="form-control" name="tenLoai" style="width:100%" value="<?php echo $x->getTenLoai()?>">
                                    <div class="error" id="password_error"></div>
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