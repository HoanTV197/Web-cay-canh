<style>
    #view {
        margin-top: 20px;
    }

    .breadcrumb {
        display: flex;
    }

    .btn {
        margin-right: 3px;
    }
</style>

<?php
include '../../controller/HoaDonNhapController.php';

// Hàm định dạng tiền tệ
function formatCurrency($number) {
    return number_format($number, 0, ',', '.') . '₫';
}

// lấy số trang hiện tại
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) $currentPage = 1;

// gọi đến controller
$hdn = new HoaDonNhapController();

// Số bản ghi trên mỗi trang
$recordsPerPage = 10;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách hóa đơn nhập</h1>
        <?php
        $list = [];
        if (isset($_POST['year'])) {
            $year = $_POST['year'];
            $month = $_POST['month'];
            $day = $_POST['day'];
            $list = $hdn->getTimeHDN($year, $month, $day);
        } else {
            $list = $hdn->getListHDN($currentPage);
        }
        ?>
        <div class="breadcrumb">
            <form action="?admin=hienThiHoaDonNhap&page=1" method="post" style="margin-right:5px;">
                <select name="year" style="padding:5px 10px;">
                    <option value=''>year</option>"
                    <?php
                    for ($i = 2021; $i <= 2023; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <select name="month" style="padding:5px 10px;">
                    <option value=''>month</option>"
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <select name="day" style="padding:5px 10px;">
                    <option value=''>day</option>"
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <button class="btn btn-primary btn-sm dropdown-toggle" type="submit" style="padding:6px 10px;">Xem</button>
            </form>

            <a class="btn btn-primary btn-sm" href="?admin=themHoaDonNhap" role="button">
                <span class="glyphicon glyphicon-plus"></span> Thêm mới
            </a>
            <a class="btn btn-primary btn-sm dropdown-toggle" href="">
                Xuất Exel
            </a>
        </div>
    </section>
    <!-- Main coupon -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row" style='padding:0px; margin:0px;'>
                                <!--ND-->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mã hóa đơn nhập </th>
                                                <th class="text-center">Ngày tạo</th>
                                                <th class="text-center">Tổng tiền </th>
                                                <th class="text-center">Mã số thuế</th>
                                                <th class="text-center">Ghi chú</th>
                                                <th class="text-center">Phương thức thanh toán</th>
                                                <th class="text-center">Giảm giá </th>
                                                <th class="text-center">Trạng thái</th>
                                                <th class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($list) == 0) {
                                                echo "<tr><td colspan='9' class='text-center'>Không có hóa đơn nào</td></tr>";
                                            }
                                            /* Hiển thị danh sách hóa đơn nhập */
                                            foreach ($list as $i) {
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaHDN() . '</td>'
                                                    . '<td class="text-center">' . $i->getNgayTao() . '</td>'
                                                    . '<td class="text-center">' . formatCurrency($i->getTongTienHD()) . '</td>'
                                                    . '<td class="text-center">' . $i->getMaSoThue() . '</td>'
                                                    . '<td class="text-center">' . $i->getGhiChu() . '</td>'
                                                    . '<td class="text-center">' . $i->getPTThanhToan() . '</td>'
                                                    . '<td class="text-center">' . $i->getGiamGiaHD() . '</td>'
                                                    . '<td class="text-center">' . $i->getTrangThai() . '</td>'
                                                    . "<td>
                                                        <a class='btn btn-success btn-xs' href='?admin=xemHDN&MaHDN=" . $i->getMaHDN() . "'>Xem</a>
                                                    </td>
                                                </tr>";
                                                echo $str;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                            <!-- --------------------------------Phân trang----------------------------------- -->
                                            <?php
                                            $totalRecords = $hdn->sumPage();
                                            $totalPages = ceil($totalRecords / $recordsPerPage);

                                            echo '<li><a href="?admin=hienThiHoaDonNhap&page=' . max(1, $currentPage - 1) . '"> <</a></li>';
                                            
                                            if ($totalPages <= 10) {
                                                for ($i = 1; $i <= $totalPages; $i++) {
                                                    echo '<li' . ($i == $currentPage ? ' class="active"' : '') . '><a href="?admin=hienThiHoaDonNhap&page=' . $i . '">' . $i . '</a></li>';
                                                }
                                            } else {
                                                for ($i = 1; $i <= 3; $i++) {
                                                    echo '<li' . ($i == $currentPage ? ' class="active"' : '') . '><a href="?admin=hienThiHoaDonNhap&page=' . $i . '">' . $i . '</a></li>';
                                                }

                                                if ($currentPage > 4 && $currentPage < $totalPages - 3) {
                                                    echo '<li><a href="?admin=hienThiHoaDonNhap&page=' . $currentPage . '">' . $currentPage . '</a></li>';
                                                    echo '<li><span>...</span></li>';
                                                } else {
                                                    echo '<li><span>...</span></li>';
                                                }

                                                for ($i = max($totalPages - 2, $currentPage + 1); $i <= $totalPages; $i++) {
                                                    echo '<li' . ($i == $currentPage ? ' class="active"' : '') . '><a href="?admin=hienThiHoaDonNhap&page=' . $i . '">' . $i . '</a></li>';
                                                }
                                            }

                                            echo '<li><a href="?admin=hienThiHoaDonNhap&page=' . min($totalPages, $currentPage + 1) . '">></a></li>';
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.ND -->
                            </div>
                        </div>
                        <!-- ./box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.coupon -->
</div>
