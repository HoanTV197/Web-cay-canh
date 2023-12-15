<?php
include '../../controller/LoaiSPController.php';
if (isset($_POST['tenLoai'])) {
    // Lấy dữ liệu từ các trường nhập liệu của khách hàng
    $TenLoai = $_POST['tenLoai'];
    $ghiChu = $_POST['ghiChu'];
   
    $loai = new LoaiSPController();
    $MaLoai = $loai->autoMaLoaiSP();
    $kq = $loai->insertLoai($MaLoai,$TenLoai,$ghiChu);
     if($kq){
        echo "Thêm thành công";
   }
   else{
    echo "Không thành công";
   }
}
?>
<div class="content-wrapper">
    <form action="admin.php?admin=themLoaiSP" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm loại sản phẩm</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu [Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiLoai&page=1" role="button">
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
                                    <label>Tên loại </label>
                                    <input type="text" class="form-control" name="tenLoai" style="width:100%" >
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