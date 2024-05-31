<style>
    .text-center img {
        width: 50px;
        height: 50px;
    }
    /* Nút Search */
.btn-search {
    background-color: #4CAF50; /* Màu xanh lá */
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease; /* Hiệu ứng chuyển màu và phóng to */
}

.btn-search:hover {
    background-color: #45a049; /* Màu xanh lá đậm hơn */
    transform: scale(1.05); /* Phóng to nhẹ */
}

/* Nút Thêm mới */
.btn-add {
    background-color: #008CBA; /* Màu xanh dương */
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-add:hover {
    background-color: #007799; /* Màu xanh dương đậm hơn */
    transform: scale(1.05);
}

/* Nút Xuất Excel */
.btn-excel {
    background-color: #f44336; /* Màu đỏ */
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-excel:hover {
    background-color: #d32f2f; /* Màu đỏ đậm hơn */
    transform: scale(1.05);
}

/* Giao diện chung cho các nút */
.btn {
    margin-right: 5px; /* Khoảng cách giữa các nút */
    text-decoration: none; /* Loại bỏ gạch chân mặc định */
}

</style>
<div class="content-wrapper">
<section class="content-header">
    <h1>Danh sách sản phẩm</h1>
    <div class="breadcrumb" style="display:flex;">
        <form action="?admin=hienThiSanPham" method="post" style="margin-right:5px;">
            <input type='text' name="search" placeholder="search" style="padding:5px;" />
            <button class="btn btn-search" type="submit">Search</button>
        </form>
        <a class="btn btn-add" href="?admin=themSanPham" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
        <a class="btn btn-excel" href="?admin=hienThiSanPham&page=1&excel=sanpham">
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
                                                <th class="text-center">Thao tác</th>
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
                                                $imagePath = '../../../assets/public/images/products/' . $i->getAnhDaiDien();

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
                                                    <td><a class='btn btn-danger btn-xs' href='?admin=xoaSanPham&MaSP=" . $i->getMaSP() . "'>Xóa</a></td>                                                    
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
                                                $totalPages = ceil($sp->sumPage('sanpham') / 8);
                                                echo '<li><a href="?admin=hienThiSanPham&page=' . ($currentPage >= 2 ? $currentPage - 1 : $currentPage) . '&sort=' . $sort . '"> <</a></li>';
                                                for ($i = 1; $i <= $totalPages; $i++) {
                                                    echo '<li><a href="?admin=hienThiSanPham&page=' . $i . '&sort=' . $sort . '">' . $i . '</a></li>';
                                                }
                                                echo '<li><a href="?admin=hienThiSanPham&page=' . ($currentPage < $totalPages ? $currentPage + 1 : $currentPage) . '&sort=' . $sort . '">></a></li>';
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