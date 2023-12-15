<?php
include_once '../../controller/SanPhamController.php';
$sanpham = new SanPhamController();

$loai = $sanpham->getLoaiSP();

    if (isset($_POST['tenSP']) ) {
        $tenSP = $_POST['tenSP'];
        $loai = $_POST['loai'];
        $moTa = $_POST['moTa'];
        $ngayNhap = $_POST['ngayNhap'];
        $giaNhap = $_POST['giaNhap'];
        $giaBan = $_POST['giaBan'];
        $ghiChu = $_POST['ghiChu'];
        $tg = $_POST['tg'];
        $hinhDaiDien = $_FILES['img']['name'];
        $MaSP = $sanpham->autoMaSP();
        $insert = $sanpham->insertProduct($MaSP, $loai, $tenSP, $giaBan, $giaNhap, $ngayNhap, $tg, $moTa, 'cây', $hinhDaiDien, $ghiChu);
        if ($insert) {
            echo "<script>alert('Thêm thành công');window.location='?admin=hienThiSanPham&page=1';</script>";
        } else {
            echo "<script>alert('Thêm thất bại');window.location='?admin=hienThiSanPham&page=1';</script>";
        }
    }
?>
<div class="content-wrapper">
    <form action="?admin=themSanPham" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm sản phẩm mới</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">
                    Lưu [Thêm]
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
                                    <input type="text" class="form-control" name="tenSP" style="width:100%" placeholder="Tên sản phẩm">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <label>Loại sản phẩm</label>
                                                <select name="loai" class="form-control" >
                                                    <option value="">[--Chọn loại sản phẩm--]</option>
                                                    <?php
                                                    foreach ($loai as $i) {
                                                        echo "<option value='" . $i->getMaLoai() . "'>" . $i->getTenLoai() . "</option>";
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
                                    <textarea name="moTa" class="form-control" row="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ngày nhập</label>
                                    <input name="ngayNhap" class="form-control" type="date">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Đơn giá nhập</label>
                                    <input name="giaNhap" class="form-control" type="number" value="1" min="1" step="1" max="1000000000">
                                </div>

                                <div class="form-group">
                                    <label>Đơn giá bán</label>
                                    <input name="giaBan" class="form-control" type="number" value="1" min="1" step="1" max="1000000000">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Thời gian bảo hành</label>
                                    <input name="tg" class="form-control" type="number" value="1" min="1" step="1" max="1000000000">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú </label>
                                    <textarea name="ghiChu" class="form-control" row="10"></textarea>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" id="image_list" name="image" />
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