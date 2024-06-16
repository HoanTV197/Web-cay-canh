<?php
include '../../controller/HoaDonNhapController.php';
// Lưu giá trị $sum vào session
$_SESSION['tongTienHoaDonNhap'] = $sum + 30000;
if (isset($_GET['MaHDN'])) {
    $MaHDN = $_GET['MaHDN'];
    $hdn = new HoaDonNhapController();
    $ct = $hdn->getChiTietDHN($MaHDN);
    $sp = $hdn->getListSP($MaHDN);
    $hoadon = $hdn->getHDN($MaHDN);
    $ncc = $hdn->getNCC($hoadon->getMaNCC());
}
?>

<div class="content-wrapper" style="min-height: 564px;">
    <section class="content-header">
        <h1> Chi tiết đơn hàng</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="?admin=suaCTHDN&page=1" role="button">Sửa</a>
            <a class="btn btn-primary btn-sm" href="?admin=hienThiHoaDonNhap&page=1" role="button">Thoát</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div id="view">
                            <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <h1 class="text-center" style="color: red;">CHI TIẾT ĐƠN HÀNG</h1>
                                <h4>Tên nhà cung cấp: <b><?php echo $ncc->getTenNCC() ?></b></h4>
                                <h4>Điện thoại: <i><?php echo $ncc->getPhone() ?></i></h4>
                                <h4>Thời gian đặt hàng: <i><?php echo $hoadon->getNgayTao() ?></i></h4>
                                <h4>Địa chỉ: <?php echo $ncc->getDiaChi() ?> </h4>
                                <h4>Mã đơn hàng: <b><?php echo $MaHDN ?></b></h4>
                                <br />
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="text-center" style="width:100px">Số lượng</th>
                                                <th style="width:120px">Giá bán</th>
                                                <th class="text-right" style="width:120px">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../model/ChiTietHDN.php';
                                            $sum = 0;
                                            for ($i = 0; $i < count($ct); $i++) {
                                                for ($j = 0; $j < count($sp); $j++) {
                                                    if ($ct[$i]->getMaSP() == $sp[$j]->getMaSP()) {
                                                        $giaBan = $sp[$j]->getDonGiaNhap() * 1000; // Nhân 1000 cho giá bán
                                                        $thanhTien = $ct[$i]->getSoLuong() * $giaBan;
                                                        $sum += $thanhTien;
                                                        echo '<tr>';
                                                        echo '<td class="text-center">' . ($i + 1) . '</td>';
                                                        echo '<td>' . $sp[$j]->getTenSP() . '</td>';
                                                        echo '<td class="text-center">' . $ct[$i]->getSoLuong() . '</td>';
                                                        echo '<td>' . number_format($giaBan, 0, ',', '.') . ' VND</td>'; 
                                                        echo '<td class="text-right">' . number_format($thanhTien, 0, ',', '.') . ' VND</td>';
                                                        echo '</tr>';
                                                    }
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="6" class="text-right" style="border: none; font-size: 1.1em;">Tổng cộng: <?php echo number_format($sum, 0, ',', '.'); ?> VND</td> 
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right" style="border: none; font-size: 0.9em;"><i>Phí vận chuyển: </i> 30.000 VND</td> 
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right" style="border: none; color: red; font-size: 1.3em;">Thành tiền: <?php echo number_format($sum + 30000, 0, ',', '.'); ?> VND</td> 
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="6">
                                                    <a class="btn btn-primary btn-md" role="button" onclick="window.print()">
                                                        <span class="glyphicon glyphicon-print"></span> In đơn hàng
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <ul class="pagination"></ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
