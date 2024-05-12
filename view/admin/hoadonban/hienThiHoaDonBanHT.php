<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách hóa đơn bán hoàn tất</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=hienThiHoaDonBanHT&page=1&excel=hoadonban">
                Xuất Excel
            </a>
        </div>
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
                                    $hdbController = new HoaDonBanController();

                                    // Lấy trang hiện tại, nếu không có thì mặc định là trang 1
                                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                                    // Lấy tổng số trang
                                    $totalPage = $hdbController->totalPage('2'); // Chỉ lấy hóa đơn hoàn tất (trạng thái 2)

                                    // Đảm bảo trang hiện tại hợp lệ
                                    if ($currentPage > $totalPage) {
                                        $currentPage = 1;
                                    }

                                    // Lấy danh sách hóa đơn hoàn tất (trạng thái 2) cho trang hiện tại
                                    $listHDB = $hdbController->listHDB($currentPage, '2');

                                    if (empty($listHDB)) {
                                        echo "<tr><td colspan='9' class='text-center'>Không có hóa đơn nào</td></tr>";
                                    } else {
                                        foreach ($listHDB as $hoaDon) {
                                            echo '<tr>';
                                            echo '<td class="text-center">' . $hoaDon->getMaHDB() . '</td>';
                                            echo '<td class="text-center">' . $hoaDon->getNgayTao() . '</td>';
                                            echo '<td class="text-center">' . $hoaDon->getTongTienHD() . '</td>';
                                            echo '<td class="text-center">' . $hoaDon->getMaSoThue() . '</td>';
                                            echo '<td class="text-center">' . $hoaDon->getGhiChu() . '</td>';
                                            echo '<td class="text-center">' . $hoaDon->getPTThanhToan() . '</td>';
                                            echo '<td class="text-center">' . $hoaDon->getGiamGiaHD() . '</td>';
                                            echo '<td class="text-center">Hoàn thành</td>';
                                            echo "<td>
                                                    <a class='btn btn-success btn-xs' href='?admin=xemChiTietHDB&MaHDB={$hoaDon->getMaHDB()}'>Xem</a>
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
                                        echo "<li class='$activeClass'><a href='?admin=hienThiHoaDonBanHT&page=$i'>$i</a></li>"; // Sử dụng ?admin=hienThiHoaDonBanHT
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
