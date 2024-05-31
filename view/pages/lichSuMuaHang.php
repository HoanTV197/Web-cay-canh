<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <h1 class="text-center">Lịch sử mua hàng</h1>
                        <div class="box-body">
                            <div class="row" style='padding:0px; margin:0px;'>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mã hóa đơn bán</th>
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
                                            include '../../controller/HoaDonBanController.php';

                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $HDB = new HoaDonBanController();
                                            $username = $_SESSION['username'];

                                            $result = $HDB->listHD_KH($username, 10, ($currentPage - 1) * 10);
                                            $listHDB = $result['listHDB'];
                                            $totalPages = $result['totalPages'];

                                            if (isset($_GET['huy']) && isset($_GET['mahoadon'])) {
                                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                                $huy = $HDB->updateHDB($_GET['mahoadon'], $_GET['huy']);
                                                if ($huy) {
                                                    echo "<script>alert('Bạn đã hủy đơn hàng thành công'); window.location.href = '?pages=lichSuMuaHang&page=$currentPage';</script>";
                                                    exit;
                                                } else {
                                                    echo "<script>alert('Hủy đơn hàng thất bại');</script>";
                                                }
                                            }

                                            foreach ($listHDB as $i) {
                                                switch ($i->getTrangThai()) {
                                                    case '0':
                                                        $trangThai = 'Chờ xác nhận';
                                                        break;
                                                    case '1':
                                                        $trangThai = 'Đã hủy';
                                                        break;
                                                    case '2':
                                                        $trangThai = 'Đã giao hàng';
                                                        break;
                                                    case '3':
                                                        $trangThai = 'Chờ lấy hàng';
                                                        break;
                                                    case '4':
                                                        $trangThai = 'Đang giao hàng';
                                                        break;
                                                    case '5':
                                                        $trangThai = 'Đã giao hàng ';
                                                        break;
                                                    case '6':
                                                        $trangThai = 'Giao hàng thất bại';
                                                        break;
                                                    default:
                                                        $trangThai = 'Không xác định';
                                                }

                                                echo '<tr>'
                                                . '<td class="text-center">' . $i->getMaHDB() . '</td>'
                                                . '<td class="text-center">' . $i->getNgayTao() . '</td>'
                                                . '<td class="text-center">' . number_format((int)$i->getTongTienHD(), 0, ",", ".") . '.000 VND</td>'
                                                . '<td class="text-center">' . $i->getMaSoThue() . '</td>'
                                                . '<td class="text-center">' . $i->getGhiChu() . '</td>'
                                                . '<td class="text-center">' . $i->getPTThanhToan() . '</td>'
                                                . '<td class="text-center">' . $i->getGiamGiaHD() . '</td>'
                                                . '<td class="text-center">' . $trangThai . '</td>'
                                                . "<td><a class='btn btn-success btn-xs' href='?pages=chiTietHDB&MaHDB=" . $i->getMaHDB() . "'>Xem</a>"
                                                . ($i->getTrangThai() == '0' ? " <a class='btn btn-danger btn-xs' href='?pages=lichSuMuaHang&page=$currentPage&huy=1&mahoadon=" . $i->getMaHDB() . "'>Hủy</a> " : "")
                                                . '</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                            <?php
                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                $link = '<li><a href="?pages=lichSuMuaHang&page=' . $i . '">' . $i . '</a></li>';
                                                if ($i == $currentPage) {
                                                    $link = '<li class="active">' . $link . '</li>';
                                                }
                                                echo $link;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
