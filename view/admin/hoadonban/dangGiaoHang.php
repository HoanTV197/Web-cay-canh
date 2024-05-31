<?php
include '../../controller/HoaDonBanController.php';

$HDB = new HoaDonBanController();
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

if (isset($_GET['action'], $_GET['MaHDB'])) {
    $action = $_GET['action'];
    $maHDB = $_GET['MaHDB'];
    $trangThai = 0;
    $message = '';

    switch ($action) {
        case 'dagiao':
            $trangThai = 5; // Đã giao hàng
            $message = 'Đơn hàng đã giao thành công';
            break;
        case 'thatbai':
            $trangThai = 6; // Giao hàng thất bại
            $message = 'Giao hàng thất bại';
            break;
        default:
            $message = 'Không có hành động nào được thực hiện';
    }

    if ($HDB->updateHDB($maHDB, $trangThai)) {
        echo "<script>alert('$message'); window.location.href = '?admin=dangGiaoHang&page=$currentPage';</script>";
        exit;
    } else {
        echo "<script>alert('Cập nhật trạng thái thất bại');</script>";
    }
}

$listHDB = $HDB->listHDB($currentPage, [4]);
$totalPage = $HDB->totalPage('4');
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách hóa đơn đang giao hàng</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Mã hóa đơn nhập</th>
                                        <th class="text-center">Ngày tạo</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Mã số thuế</th>
                                        <th class="text-center">Ghi chú</th>
                                        <th class="text-center">Phương thức thanh toán</th>
                                        <th class="text-center">Giảm giá</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($listHDB)) {
                                        echo "<tr><td colspan='9' class='text-center'>Không có hóa đơn nào</td></tr>";
                                    } else {
                                        foreach ($listHDB as $i) {
                                            echo '<tr>';
                                            echo '<td class="text-center">' . $i->getMaHDB() . '</td>';
                                            echo '<td class="text-center">' . $i->getNgayTao() . '</td>';
                                            echo '<td class="text-center">' . number_format((int)$i->getTongTienHD(), 0, ",", ".") . '.000 VND</td>';
                                            echo '<td class="text-center">' . $i->getMaSoThue() . '</td>';
                                            echo '<td class="text-center">' . $i->getGhiChu() . '</td>';
                                            echo '<td class="text-center">' . $i->getPTThanhToan() . '</td>';
                                            echo '<td class="text-center">' . $i->getGiamGiaHD() . '</td>';
                                            echo '<td class="text-center">Đang giao hàng</td>';
                                            echo "<td>
                                                    <a class='btn btn-success btn-xs' href='?admin=dangGiaoHang&MaHDB={$i->getMaHDB()}&action=dagiao&page=$currentPage'>Đã giao</a>
                                                    <a class='btn btn-danger btn-xs' href='?admin=dangGiaoHang&MaHDB={$i->getMaHDB()}&action=thatbai&page=$currentPage'>Thất bại</a>
                                                  </td>";
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="pagination">
                                    <?php
                                    for ($i = 1; $i <= $totalPage; $i++) {
                                        $activeClass = ($i == $currentPage) ? 'active' : '';
                                        echo "<li class='$activeClass'><a href='?admin=dangGiaoHang&page=$i'>$i</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
