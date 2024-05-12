<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách hóa đơn hủy</h1>
        <div class="breadcrumb">
        <a class="btn btn-primary btn-sm dropdown-toggle" href="xuat_excel_hoa_don_huy.php">
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
                                        <th class="text-center">Mã hóa đơn</th>
                                        <th class="text-center">Ngày tạo</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Mã số thuế</th>
                                        <th class="text-center">Ghi chú</th>
                                        <th class="text-center">Phương thức thanh toán</th>
                                        <th class="text-center">Giảm giá</th>
                                        <th class="text-center">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../controller/HoaDonBanController.php';
                                    $hdbController = new HoaDonBanController();
                                    
                                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                                    // Lấy tổng số trang của hóa đơn đã hủy (trạng thái 1)
                                    $totalPage = $hdbController->totalPage('1');

                                    // Đảm bảo trang hiện tại hợp lệ
                                    if ($currentPage > $totalPage) {
                                        $currentPage = 1;
                                    }
                                    
                                    $listHDB = $hdbController->listHDB($currentPage, '1'); // Lấy danh sách hóa đơn hủy (trạng thái 1)

                                    if (empty($listHDB)) {
                                        echo "<tr><td colspan='8' class='text-center'>Không có hóa đơn nào</td></tr>";
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
                                            echo '<td class="text-center" style = "color: red;">Đã hủy</td>'; // Hiển thị trạng thái
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
                                        echo "<li class='$activeClass'><a href='?admin=hienThiHoaDonBanHUY&page=$i'>$i</a></li>"; 
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
