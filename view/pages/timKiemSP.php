<?php
include '../../controller/SanPhamController.php';

// Get current page, sort, minPrice, and maxPrice parameters
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name-asc';
$tenSP = isset($_POST['TenSP']) ? $_POST['TenSP'] : '';

// Initialize the controller
$sp = new SanPhamController();

// Get the list of products based on the search query
$listspTK = $sp->timKiemSanPham($tenSP);

// Get all products with pagination and sorting
$listsp = $sp->getAllProduct($currentPage, $sort);
$listsp1 = $sp->getAllProduct1();

?>
<style>
    .price-box {
        margin: 0px !important;
    }

    .text-center .them {
        color: white;
        padding: 6px;
        font-size: 13px;
        background-color: #0ce90a;
        border: none;
    }
</style>
<section id="product-all" class="collection">
    <div class="slider">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left">
                    <div class="widget" style="margin: 0px; min-height: 0px;">
                        <p>Danh mục sản phẩm</p>
                    </div>
                    <ul class="main-ul">
                        <li>
                            <a href='san-pham/cay-canh-ngoai-that' title='Cây cảnh ngoại thất'>Cây cảnh ngoại thất<i class="fa fa-angle-right pull-right" aria-hidden="true"></i></a>
                            <ul class="sub">
                                <li><a href='san-pham/cay-canh-nghe-thuat' title='Cây cảnh nghệ thuật'>Cây cảnh nghệ thuật</a></li>
                                <li><a href='san-pham/cay-canh-vuon' title='Cây cảnh vườn'>Cây cảnh vườn</a></li>
                            </ul>
                        </li>
                        <li><a href='san-pham/cay-canh-noi-that' title='Cây cảnh nội thất'>Cây cảnh nội thất<i class="fa fa-angle-right pull-right" aria-hidden="true"></i></a>
                            <ul class="sub">
                                <li><a href='san-pham/ua-chuong-trong-nha' title='Ưa chuộng trong nhà'>Ưa chuộng trong nhà</a></li>
                                <li><a href='san-pham/cay-canh-de-ban' title='Cây cảnh để bàn'>Cây cảnh để bàn</a></li>
                                <li><a href='san-pham/cay-canh-van-phong' title='Cây cảnh văn phòng'>Cây cảnh văn phòng</a></li>
                            </ul>
                        </li>
                        <li><a href='san-pham/cay-giong' title='Cây giống'>Cây giống</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 products-sale-off">
                    <div class="widget">
                        <p>Sản phẩm mới</p>
                        <div class="panel-left-body">
                            <div id="post-list-footer" class="sidebar_menu">
                                <?php
                                /*--------------Sản phẩm mới -------------*/
                                for ($i = count($listsp1) - 1; $i > count($listsp1) - 5; $i--) {
                                    $str = "<div class='spost clearfix'>
                                    <div class='entry-image'>
                                    <a href='?pages=chiTietSP&MaSP=" . $listsp1[$i]->getMaSP() . "' title='Cây Lan Hạt Dưa'>
                                    <img src='../../assets/public/images/products/" . $listsp1[$i]->getAnhDaiDien() . "'></a></div>
                                    <div class='entry-c' style='width:194px;'>
                                        <div class='entry-title'>
                                        <a class='ws-nw overflow ellipsis' href=cay-lan-hat-dua title='Cây Lan Hạt Dưa'>" . $listsp1[$i]->getTenSP() . "</a>
                                        </div>
                                        <ul class='entry-meta'>
                                            <li class='color'><ins>" . $listsp1[$i]->getDonGiaBan() . "₫</ins><del>" . ($listsp1[$i]->getDonGiaBan() + 10) . "₫</del></li>
                                        </ul>
                                        <div>
                                        </div>
                                    </div>
                                </div>";
                                    echo $str;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content">
                <div class="product-wrap">
                    <div class="collection__title">
                        <div class="collection-filter" id="list-product">
                            <div class="category-products clearfix">
                                <form action="" method="post" id="product">
                                    <div class="products-grid clearfix">
                                        <?php
                                        /*--------------Danh sách sản phẩm -------------*/
                                        foreach ($listspTK as $i) {
                                            $itemCart = [
                                                "code" => $i->getMaSP(),
                                                "name" => $i->getTenSP(),
                                                "image" => $i->getAnhDaiDien(),
                                                "price" => $i->getDonGiaBan(),
                                                "quantity" => 1
                                            ];
                                            $str = "<div class='col-md-3 col-lg-3 col-xs-6 col-6'>
                                        <div class='product-lt'>
                                            <div class='lt-product-group-image'>
                                                <a href='?pages=chiTietSP&MaSP=" . $i->getMaSP() . "' title='Cây Lan Hạt Dưa'>
                                                    <img class='img-p' src='../../assets/public/images/products/" . $i->getAnhDaiDien() . "' >
                                                </a>
                                            </div>
                                            <div class='lt-product-group-info'>
                                                <a href='pages=chTietSP&MaSP=" . $i->getMaSP() . "' title='Cây Lan Hạt Dưa'>
                                                    <h3>" . $i->getTenSP() . "</h3>
                                                </a>
                                                <div class='price-box'>
                                                    <p class='old-price'>
                                                        <span class='price'>" . number_format($i->getDonGiaBan() + 10) . ",000₫</span>
                                                    </p>
                                                    <p class='special-price'>
                                                        <span class='price'>" . number_format($i->getDonGiaBan()) . ",000₫</span>
                                                    </p>
                                                </div>
                                                <div class='text-center'><button type='button' class='them' onClick='addCart(" . json_encode($itemCart) . ")'>Thêm vào giỏ hàng</button></div>
                                                <div class='clear'></div>
                                            </div>
                                        </div>
                                    </div>";
                                            echo $str;
                                        }
                                        ?>
                                    </div>
                                </form>
                                <div class="text-center pull-right">
                                    <ul class="pagination">
                                        <!-- Pagination -->
                                        <?php
                                        echo '<li><a href="?pages=sanpham&page=' . ($currentPage >= 2 ? $currentPage - 1 : 1) . '"> <</a></li>';
                                        for ($i = 1; $i <= round($sp->sumPage('sanpham') / 10) + 1; $i++) {
                                            $str = '<li><a href="?pages=sanpham&page=' . $i . '">' . $i . '</a></li>';
                                            if ($i > 5 && $i < round($sp->sumPage('sanpham') / 10)) {
                                                $str = '<li>...</li>';
                                                $str = '<li><a href="?pages=sanpham&page=' . round($sp->sumPage('sanpham') / 10) . '">' . round($sp->sumPage('sanpham') / 10) . '</a></li>';
                                                echo $str;
                                                break;
                                            }
                                            echo $str;
                                        }
                                        echo '<li><a href="?pages=sanpham&page=' . ($currentPage >= round($sp->sumPage('sanpham') / 10) ? $currentPage : $currentPage + 1) . '">></a></li>';
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function sortby(value) {
                            let url = new URL(window.location.href);
                            url.searchParams.set('sort', value);
                            window.location.href = url.toString();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
