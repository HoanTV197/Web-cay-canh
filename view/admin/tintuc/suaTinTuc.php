<?php
include '../../controller/TinTucController.php';
$tt = new TinTucController();
$maTT = $_GET['MaTinTuc'];
echo $maTT;
$tin = $tt->getNews($maTT);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Lấy dữ liệu từ các trường input
    $tieuDe = $_POST['tieuDe'];
    $moTaNgan = $_POST['moTaNgan'];
    $text = $_POST['text'];
    $ngayTao = $_POST['ngayTao'];
    $img = $_FILES['img']['name'];
    if ($tieuDe == '' || $moTaNgan == "" || $text == "" || $ngayTao == "" || $img == "") {
        echo "<script>alert(Vui lòng nhập đầy đủ thông tin);window.location='?admin=hienThiTinTuc&page=1'</script>";
    } else {
        // Sửa dữ liệu vào database
        $kq = $tt->editNews($maTT, $tieuDe, $moTaNgan, $text, $img, $ngayTao);
        if ($kq) {
            echo "<script>alert('sửa thành công');window.location='?admin=hienThiTinTuc&page=1'</script>";
        } else {
            echo "<script>alert('sửa thất bại');window.location='?admin=hienThiTinTuc&page=1'</script>";
        }
    }
}
?>

<div class="content-wrapper">
    <form action="?admin=suaTinTuc&MaTinTuc=<?php echo $maTT; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Sửa viết mới</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm" onclick="check()">

                    Lưu[Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="admin/content" role="button">
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
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <input type="text" class="form-control" name="tieuDe" style="width:100%" placeholder="Tên bài viết" value="<?php echo $tin->getTieuDe(); ?>">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="moTaNgan" class="form-control" value="<?php echo $tin->getmoTaNgan(); ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ngày đăng:</label>
                                    <input type="date" class="form-control" name="ngayTao" style="width:100%" placeholder="Tên bài viết" value="<?php echo $tin->getNgayTao(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Chi tiết bài viết</label>
                                    <textarea name="text" id="fulltext" class="form-control" value="<?php echo $tin->getNoiDung(); ?>"></textarea>
                                    <script>
                                        CKEDITOR.replace('fulltext');
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hình đại diện</label>
                                    <input type="file" id="image_list" name="img" style="width: 100%" required>
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
