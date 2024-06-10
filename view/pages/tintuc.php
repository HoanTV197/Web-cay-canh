<?php
include '../../controller/TinTucController.php';
$tt = new TinTucController();
$tin = $tt->getAllNews1();
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<style>
    .fs-n2-info {
        padding-left: 10px;
    }

    .fs-ne2-img img {
        width: 150px;
        height: 150px;
    }
</style>
<section id="content">
    <div class="row wraper">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left">
                    <div class="widget" style="margin: 0px; min-height: 0px;">
                        <p>Danh mục sản phẩm</p>
                    </div>
                    <ul class="main-ul">
                        <li><a href='san-pham/cay-canh-ngoai-that' title='Cây cảnh ngoại thất'>Cây cảnh ngoại thất<i class="fa fa-angle-right pull-right" aria-hidden="true"></i></a>
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
                <div class="widget">
                    <p>Bài viết mới nhất</p>
                    <div class="tab-container">
                        <?php
                        $count = count($tin);
                        for ($i = $count - 1; $i >= max(0, $count - 4); $i--) {
                            $str = "
                            <div class='spost clearfix'>
                            <div class='entry-image e-img'>
                                <a href='?pages=chiTietTinTuc&MaTinTuc=" . $tin[$i]->getMaTinTuc() . "'>
                                    <img class='img-circle-custom' src='../../assets/public/images/products/" . $tin[$i]->getAnh() . "'>
                                </a>
                            </div>
                            <div class='entry-c'>
                                <div class='entry-title e-title'>
                                    <h4>
                                        <a href='?pages=chiTietTinTuc&MaTinTuc=" . $tin[$i]->getMaTinTuc() . "'>" . $tin[$i]->getTieuDe() . "</a>
                                    </h4>
                                </div>
                            </div>
                        </div>";
                            echo $str;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content" id="list-content">
                <div class="product-wrap">
                    <div class="fs-newsboxs">
                        <?php
                        $tin1 = $tt->getAllNews($currentPage);
                        foreach ($tin1 as $i) {
                            $str = '
                        <div class="fs-ne2-it clearfix">
                            <div class="fs-ne2-if">
                                <a class="fs-ne2-img" href="?pages=chiTietTinTuc&MaTinTuc=' . $i->getMaTinTuc() . '">
                                <img src="../../assets/public/images/products/' . $i->getAnh() . '" alt="">
                                </a>
                                <div class="fs-n2-info">
                                    <h3><a class="fs-ne2-tit" href="?pages=chiTietTinTuc&MaTinTuc=' . $i->getMaTinTuc() . '" title="">' . $i->getTieuDe() . '</a></h3>
                                    <div class="fs-ne2-txt">' . $i->getmoTaNgan() . '</div>
                                    <p class="fs-ne2-bot">
                                        <span class="fs-ne2-user">
                                            <img class="lazy" src="">
                                        </span>
                                        <span>' . $i->getNgayTao() . '</span>
                                    </p>
                                </div>
                            </div>
                        </div>';
                            echo $str;
                        }
                        ?>
                    </div>
                    <div class="row text-center">
                        <ul class="pagination">
                            <?php
                            $n = round($tt->sumPage() / 10);
                            echo '<li><a href="?pages=tintuc&page=' . ($currentPage >= 2 ? $currentPage - 1 : $currentPage) . '"> <</a></li>';
                            for ($i = 1; $i <= $n + 1; $i++) {
                                $str = '<li><a href="?pages=tintuc&page=' . $i . '">' . $i . '</a></li>';
                                if ($i > 5 && $i < $n) {
                                    $str = '<li>...</li>';
                                    $str = '<li><a href="?pages=tintuc&page=' . $n . '">' . $n . '</a></li>';
                                    echo $str;
                                    break;
                                }
                                echo $str;
                            }
                            echo '<li><a href="?pages=tintuc&page=' . ($currentPage >= $n ? $currentPage : $currentPage + 1) . '">></a></li>';
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>