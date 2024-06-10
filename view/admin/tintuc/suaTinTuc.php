<?php
include '../../controller/TinTucController.php';
$tt = new TinTucController();
$maTT = $_GET['MaTinTuc'];
$tin = $tt->getNews($maTT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ các trường input
    $tieuDe = $_POST['tieuDe'];
    $moTaNgan = $_POST['moTaNgan'];
    $text = $_POST['text'];
    $ngayTao = $_POST['ngayTao'];

    // Kiểm tra xem đã có tệp ảnh mới được tải lên hay chưa
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img = $_FILES['img']['name'];
        $target_dir = "../../assets/public/images/products/";
        $target_file = $target_dir . basename($img);

        // Di chuyển tệp tải lên vào thư mục đích
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            // Sửa dữ liệu vào database
            if ($tieuDe == '' || $moTaNgan == "" || $text == "" || $ngayTao == "") {
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin');window.location='?admin=suaTinTuc&MaTinTuc=$maTT'</script>";
            } else {
                $kq = $tt->editNews($maTT, $tieuDe, $moTaNgan, $text, $img, $ngayTao);
                if ($kq) {
                    echo "<script>alert('Sửa thành công');window.location='?admin=hienThiTinTuc&page=1'</script>";
                } else {
                    echo "<script>alert('Sửa thất bại');window.location='?admin=suaTinTuc&MaTinTuc=$maTT'</script>";
                }
            }
        } else {
            echo "<script>alert('Có lỗi xảy ra khi tải lên tệp ảnh.');window.location='?admin=suaTinTuc&MaTinTuc=$maTT'</script>";
        }
    } else {
        // Nếu không có tệp ảnh mới, giữ nguyên ảnh cũ
        $img = $tin->getAnh();

        // Sửa dữ liệu vào database
        if ($tieuDe == '' || $moTaNgan == "" || $text == "" || $ngayTao == "") {
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin');window.location='?admin=suaTinTuc&MaTinTuc=$maTT'</script>";
        } else {
            $kq = $tt->editNews($maTT, $tieuDe, $moTaNgan, $text, $img, $ngayTao);
            if ($kq) {
                echo "<script>alert('Sửa thành công');window.location='?admin=hienThiTinTuc&page=1'</script>";
            } else {
                echo "<script>alert('Sửa thất bại');window.location='?admin=suaTinTuc&MaTinTuc=$maTT'</script>";
            }
        }
    }
}
?>

<div class="content-wrapper">
    <form action="?admin=suaTinTuc&MaTinTuc=<?php echo $maTT; ?>" enctype="multipart/form-data" method="POST"
        accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa bài viết</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">Lưu[Sửa]</button>
                <a class="btn btn-primary btn-sm" href="?admin=hienThiTinTuc&page=1" role="button">Thoát</a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>

                                    <input type="text" class="form-control" name="tieuDe" style="width:100%"
                                        placeholder="Tên bài viết" value="<?php echo $tin->getTieuDe(); ?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="moTaNgan"
                                        class="form-control"><?php echo $tin->getmoTaNgan(); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ngày đăng:</label>
                                    <input type="date" class="form-control" name="ngayTao" style="width:100%"
                                        value="<?php echo $tin->getNgayTao(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Chi tiết bài viết</label>
                                    <textarea name="text" id="fulltext"
                                        class="form-control" rows="10" cols="50"><?php echo $tin->getNoiDung(); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hình đại diện hiện tại</label>
                                    <img src="../../assets/public/images/products/<?php echo $tin->getAnh(); ?>"
                                        style="width: 100%; height: auto;">
                                </div>
                                <div class="form-group">
                                    <label>Hình đại diện mới (nếu có)</label>
                                    <input type="file" id="image_list" name="img" style="width: 100%">
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