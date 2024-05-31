<?php
include_once '../../controller/SanPhamController.php';
$sanpham = new SanPhamController();
$loai = $sanpham->getLoaiSP();
$maSP = $_GET['MaSP'];
$sp = $sanpham->getProduct($maSP);

if(isset($_POST['tenSP'])){
    $TenSP = $_POST['tenSP'];
    $MaLoai = $_POST['loai'];
    $MoTaSP = $_POST['moTa'];
    $NgayNhap = $_POST['ngayNhap'];
    $DonGiaNhap = $_POST['giaNhap'];
    $DonGiaBan = $_POST['giaBan'];
    $GhiChu = $_POST['ghiChu'];
    $ThoiGianBH = $_POST['tg'];
    
    // Xử lý việc tải lên ảnh
    $AnhDaiDien = $_FILES['img']['name'];
    $target_dir = "../../assets/public/images/products/";
    $target_file = $target_dir . basename($AnhDaiDien);
    
    // Kiểm tra nếu ảnh được tải lên thành công
    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
        $kq = $sanpham->editProduct($maSP, $MaLoai, $TenSP, $DonGiaBan, $DonGiaNhap, $NgayNhap, $ThoiGianBH, $MoTaSP, 'cây', $AnhDaiDien, $GhiChu);
        if ($kq) {
            echo "<script>alert('Sửa thành công');window.location='?admin=hienThiSanPham&page=1';</script>";
        } else {
            echo "<script>alert('Sửa không thành công');window.location='?admin=hienThiSanPham&page=1';</script>";
        }
    } else {
        echo "<script>alert('Tải lên ảnh thất bại.');</script>";
    }
}
?>

<div class="content-wrapper">
    <form action="<?php echo '?admin=suaSanPham&MaSP=' . $maSP;?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa sản phẩm</h1>
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
                                    <input type="text" class="form-control" name="tenSP" style="width:100%" placeholder="Tên sản phẩm" value="<?php echo $sp->getTenSP()?>">
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
                                                        foreach($loai as $i){
                                                        echo "<option value='".$i->getMaLoai()."'>".$i->getTenLoai()."</option>";
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
                                    <textarea name="moTa" class="form-control" rows="10"><?php echo $sp->getMoTaSP()?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ngày nhập</label>
                                    <input name="ngayNhap" class="form-control" type="date" value="<?php echo $sp->getNgayNhap()?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Đơn giá nhập</label>
                                    <input name="giaNhap" class="form-control" type="number" value="<?php echo $sp->getDonGiaNhap()?>" min="0" step="1" max="1000000000">
                                </div>
                                
                                <div class="form-group">
                                    <label>Đơn giá bán</label>
                                    <input name="giaBan" class="form-control" type="number" value="<?php echo $sp->getDonGiaBan()?>" min="0" step="1" max="1000000000">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Thời gian bảo hành</label>
                                    <input name="tg" class="form-control" type="number" value="<?php echo $sp->getThoiGianBH()?>" min="0" step="1" max="1000000000">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú </label>
                                    <input name="ghiChu" class="form-control" type="text" value="<?php echo $sp->getGhiChu()?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm hiện tại</label>
                                    <img src="../../assets/public/images/products/<?php echo $sp->getAnhDaiDien(); ?>" alt="Current Image" style="width:100px; height:100px;">
                                </div>
                                <div class="form-group">
                                    <label>Thay đổi hình ảnh sản phẩm</label>
                                    <input type="file" id="image_list" name="img" multiple>
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
</div>
