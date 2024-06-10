<?php
include_once '../../controller/TinTucController.php';
$tt = new TinTucController();  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ các trường input
    $tieuDe = $_POST['tieuDe'];
    $moTaNgan = $_POST['moTaNgan'];
    $text = $_POST['text'];
    $NgayTao = $_POST['ngayTao'];

    // Kiểm tra xem đã có tệp ảnh được tải lên hay chưa
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img = $_FILES['img']['name'];
        $target_dir = "../../assets/public/images/products/";
        $target_file = $target_dir . basename($img);

        // Di chuyển tệp tải lên vào thư mục đích
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            $MaTT = $tt->autoMaTT();

            // Lưu dữ liệu vào database
            if ($tieuDe == '' || $moTaNgan == '' || $text == '' || $NgayTao == '') {
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');window.location='?admin=themTinTuc'</script>";
            } else {
                $kq = $tt->insertNews($MaTT, $tieuDe, $moTaNgan, $text, $img, $NgayTao);
                if ($kq) {
                    echo "<script>alert('Thêm thành công');window.location='?admin=hienThiTinTuc&page=1'</script>";
                } else {
                    echo "<script>alert('Thêm thất bại');window.location='?admin=themTinTuc'</script>";
                }
            }
        } else {
            echo "<script>alert('Có lỗi xảy ra khi tải lên tệp ảnh.');window.location='?admin=themTinTuc'</script>";
        }
    } else {
        echo "<script>alert('Vui lòng chọn tệp ảnh.');window.location='?admin=themTinTuc'</script>";
    }
}
?>

<div class="content-wrapper">
    <form action="?admin=themTinTuc" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1> Thêm bài viết mới</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-primary btn-sm">Lưu[Thêm]</button>
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
                                    <input type="text" class="form-control" name="tieuDe" style="width:100%" placeholder="Tên bài viết">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="moTaNgan" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ngày đăng:</label>
                                    <input type="date" class="form-control" name="ngayTao" style="width:100%" placeholder="Ngày đăng">
                                </div>
                                <div class="form-group">
                                    <label>Chi tiết bài viết</label>
                                    <textarea name="text" id="fulltext" class="form-control" rows="10" cols="50"></textarea>
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