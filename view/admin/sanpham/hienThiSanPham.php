<style>
    .text-center img {
        width: 50px;
        height: 50px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách sản phẩm</h1>
        <div class="breadcrumb" style="display:flex;">
            <form action="?admin=hienThiSanPham" method="post" style="margin-right:5px;">
                <input type='text' name="search" placeholder="search" style="padding:5px;" />
                <button class="btn btn-primary btn-sm dropdown-toggle" type="submit">Search</button>
            </form>
            <a class="btn btn-primary btn-sm" href="?admin=themSanPham" role="button" style="margin-right:5px;">
                <span class="glyphicon glyphicon-plus"></span> Thêm mới
            </a>
            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=hienThiSanPham&page=1&excel=sanpham">
                Xuất Excel
            </a>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row" style='padding:0px; margin:0px;'>
                                <!-- Content -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mã Sản Phẩm</th>
                                                <th class="text-center">Ảnh đại diện</th>
                                                <th class="text-center">Tên Sản Phẩm</th>
                                                <th class="text-center">Ngày nhập</th>
                                                <th class="text-center">Đơn giá nhập</th>
                                                <th class="text-center">Đơn giá bán</th>
                                                <th class="text-center">Đơn vị tính</th>
                                                <th class="text-center">Mô tả sản phẩm</th>
                                                <th class="text-center">Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../controller/SanPhamController.php';
                                            // Initialize the controller
                                            $sp = new SanPhamController();

                                            // Get current page and sort parameter
                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'name-asc';

                                            // If searching, use the search method
                                            if (isset($_POST['search'])) {
                                                $productList = $sp->timKiemSanPham($_POST['search']);
                                            } else {
                                                $productList = $sp->getAllProduct($currentPage, $sort);
                                            }

                                            // Display product list
                                            foreach ($productList as $i) {
                                                $imagePath = '../../assets/public/images/products/' . $i->getAnhDaiDien();
                                                // echo "Image path for product " . $i->getMaSP() . ": " . $imagePath . "<br>"; // Debugging line
                                            
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaSP() . '</td>'
                                                    . '<td class="text-center"><img src="' . $imagePath . '"></td>'
                                                    . '<td class="text-center">' . $i->getTenSP() . '</td>'
                                                    . '<td class="text-center">' . $i->getNgayNhap() . '</td>'
                                                    . '<td class="text-center">' . $i->getDonGiaNhap() . '</td>'
                                                    . '<td class="text-center">' . $i->getDonGiaBan() . '</td>'
                                                    . '<td class="text-center">' . $i->getDonViTinh() . '</td>'
                                                    . '<td class="text-center">' . $i->getMoTaSP() . '</td>'
                                                    . '<td class="text-center">' . $sp->getSoLuongTon($i->getMaSP()) . '</td>'
                                                    . "<td><a class='btn btn-success btn-xs' href='?admin=suaSanPham&MaSP=" . $i->getMaSP() . "'>Sửa</a></td>
                                                    <td>
                                                        <a class='btn btn-danger btn-xs' href='?admin=xoaSanPham&MaSP=" . $i->getMaSP() . "'>Xóa</a>
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
                                            <!-- Pagination -->
                                            <?php
                                            if (!isset($_POST['search'])) {
                                                echo '<li><a href="?admin=hienThiSanPham&page=' . ($currentPage >= 2 ? $currentPage - 1 : $currentPage) . '&sort=' . $sort . '"> <</a></li>';
                                                for ($i = 1; $i <= round($sp->sumPage('sanpham') / 8); $i++) {
                                                    $str = '<li><a href="?admin=hienThiSanPham&page=' . $i . '&sort=' . $sort . '">' . $i . '</a></li>';
                                                    if ($i > 5 && $i < round($sp->sumPage('sanpham') / 8)) {
                                                        $str = '<li>...</li>';
                                                        $str = '<li><a href="?admin=hienThiSanPham&page=' . round($sp->sumPage('sanpham') / 8) . '&sort=' . $sort . '">' . round($sp->sumPage('sanpham') / 8) . '</a></li>';
                                                        echo $str;
                                                        break;
                                                    }
                                                    echo $str;
                                                }
                                                echo '<li><a href="?admin=hienThiSanPham&page=' . ($currentPage >= round($sp->sumPage('sanpham') / 8) ? $currentPage : $currentPage + 1) . '&sort=' . $sort . '">></a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.Content -->
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
    <!-- /.content -->
</div>

<script>
    function sortby(value) {
        window.location.href = "?admin=hienThiSanPham&page=<?= $currentPage ?>&sort=" + value;
    }
</script>
