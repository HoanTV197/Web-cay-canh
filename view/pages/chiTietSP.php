<?php
include '../../controller/SanPhamController.php';
$maSP = $_GET['MaSP'];
$sp = new SanPhamController();
$sanpham = $sp->getProduct($maSP);
$itemCart = [
    "code" => $sanpham->getMaSP(),
    "name" => $sanpham->getTenSP(),
    "image" => $sanpham->getAnhDaiDien(),
    "price" => $sanpham->getDonGiaBan(),
    "quantity" => 1
];
?>
<section id="product-detail ">
    <div class="container ">
        <div class="products-wrap ">
            <form action="?pages=chiTietSP" method="post " >
                <div class="breadcrumbs ">
                    <ul>
                        <li class="home ">
                            <a href="?pages=trangchu" title="Go to Home Page ">Trang chủ</a>
                            <i class="fa fa-angle-right "></i>
                        </li>
                        <li class="category3 ">
                            <a href=" " title=" ">Cây cảnh nghệ thuật</a>
                            <i class="fa fa-angle-right "></i>
                        </li>
                        <li class="product "><?php echo $sanpham->getTenSP(); ?></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 listimg-desc-product ">
                    <div class="flexslider">
                        <ul class="slides " style="width: 800%; transition-duration: 0s; transform: translate3d(-1120.8px, 0px, 0px);">
                            <li data-thumb="../../assets/public/images/products/<?php echo $sanpham->getAnhDaiDien(); ?> " class="clone" aria-hidden="true" style="width: 560.4px; float: left; display: block;">
                                <div class="thumb-image "> <img src="../../assets/public/images/products/<?php echo $sanpham->getAnhDaiDien(); ?> " class="img-responsive " draggable="false"> </div>
                            </li>
                            <li data-thumb="../../assets/public/images/products/<?php echo $sanpham->getAnhDaiDien(); ?> " style="width: 560.4px; float: left; display: block;" class="">
                                <div class="thumb-image "> <img src="../../assets/public/images/products/<?php echo $sanpham->getAnhDaiDien(); ?> " class="img-responsive " draggable="false"> </div>
                            </li>
                            <li data-thumb="../../assets/public/images/products/<?php echo $sanpham->getAnhDaiDien(); ?> " style="width: 560.4px; float: left; display: block;" class="flex-active-slide">
                                <div class="thumb-image "> <img src="../../assets/public/images/products/<?php echo $sanpham->getAnhDaiDien(); ?>" class="img-responsive " draggable="false"> </div>
                            </li>
                            
                        </ul>
                       
                        <div class="clearfix "></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
                    <div class="product-view-content ">
                        <div class="product-view-name ">
                            <h1><?php echo $sanpham->getTenSP(); ?></h1>
                        </div>
                        <div class="product-view-price ">
                            <div class="pull-left ">
                                <span class="price-label ">Giá bán:</span>
                                <span class="price "><?php echo $sanpham->getDonGiaBan(); ?>₫</span>
                            </div>
                            <div class="product-view-price-old ">
                                <span class="price "><?php echo ($sanpham->getDonGiaBan() + 10); ?>₫</span>
                                <span class="sale-flag ">-20%</span>
                            </div>
                        </div>
                        <div class="product-status ">
                            <p style=" float: left;margin-right: 10px; ">Thương hiệu: Cây cảnh nghệ thuật</p>
                            <p>| Tình trạng: <?php echo $sanpham->getGhiChu(); ?></p>
                        </div>
                        <div class="product-view-desc ">
                            <h4>Mô tả:</h4>
                            <p><?php echo $sanpham->getMoTaSP(); ?></p>
                        </div>
                        <div class="actions-qty ">
                            <?php
                            echo " <div class='actions-qty__button'>
                            <a class='button btn-cart add_to_cart_detail detail-button'
                             href='' class='fa fa-shopping-cart ' 
                             style='padding:10px 5px;' onClick='addCart(".json_encode($itemCart).")'> Thêm vào giỏ hàng</a>
                            
                        </div>";
                            ?>
                           
                        </div>
                        <div class="fk-boxs " id="km-all " data-comt="False ">
                            <div id="km-detail ">
                                <p class="fk-tit ">Khuyến mại đặc biệt (SL có hạn)</p>
                                <div class="fk-main ">
                                    <div class="fk-sales ">
                                        </ul>
                                        <ul>
                                            <li>Tặng chậu kiểng (khi phiếu mua hàng trên 300,000 đ)</li>
                                        </ul>
                                        <ul>
                                            <li>Tặng phân giống cây trồng (Áp dụng đến hết năm 2021) <a href="# " target="_blank ">Xem chi tiết</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>Giảm thêm 100,000đ khi mua đơn hàng trên 500,000đ <a href="# " target="_blank ">Xem chi tiết</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 20px; ">
                            <b>Tình trạng</b>
                            <br>
                            <span>Cây khỏe khắn, không sâu, không héo kèm sách hướng dẫn</span>
                        </div>
                        <div style="margin-top: 20px; ">
                            <b>Bảo hành</b>
                            <br>
                            <span>Bảo hành 1 tuần cho các loại cây mua kèm theo chậu</span><a href="# " style="color:red "> (Chi tiết)</a>
                        </div>
                    </div>
                </div>
                <div class="product-v-desc col-md-10 col-12 col-xs-12 ">
                    <h3>Đặc điểm nổi bật</h3>
                    <p><strong>Giới thiệu c&acirc;y Lan hạt dưa</strong></p>

                    <ul>
                        <li>T&ecirc;n thường gọi: C&acirc;y Lan hạt dưa, c&acirc;y lan dollar&nbsp;</li>
                        <li>T&ecirc;n khoa học: Dischidia sp</li>
                        <li>Họ: Asclepiadaceae</li>
                    </ul>

                    <p><strong>Đặc điểm</strong></p>

                    <ul>
                        <li>L&agrave; c&acirc;y d&acirc;y leo, th&acirc;n thảo, mọc th&agrave;nh bụi, leo l&ecirc;n cao v&agrave; t&igrave;m nơi b&aacute;m trụ.</li>
                        <li>L&aacute; nhỏ h&igrave;nh bầu dục tr&ocirc;ng giống như đồng tiền $ n&ecirc;n được gọi l&agrave; Dollar.&nbsp;</li>
                        <li>M&eacute;p l&aacute; nguy&ecirc;n, g&acirc;n ch&iacute;nh nổi chia l&agrave;m hai phần r&otilde; rệt, l&aacute; cong v&agrave; mọc đối xứng.</li>
                        <li>L&aacute; d&agrave;y v&agrave; mọng, hai mặt l&aacute; nhẵn xanh, l&aacute; c&agrave;ng gần ngọn m&agrave;u xanh c&agrave;ng nhạt.</li>
                        <li>C&oacute; tốc độ sinh trưởng nhanh, chịu b&oacute;ng b&aacute;n phần v&agrave; nh&acirc;n giống chủ yếu từ t&aacute;ch bụi.</li>
                    </ul>

                    <p><strong>C&ocirc;ng dụng</strong></p>

                    <ul>
                        <li>Trồng trong c&aacute;c chậu treo trang tr&iacute; qu&aacute;n cafe, nh&agrave; h&agrave;ng, s&acirc;n vườn, trang tr&iacute; ban c&ocirc;ng&hellip;</li>
                        <li>Ph&ugrave; hợp l&agrave;m chậu treo hơn</li>
                    </ul>

                    <p><strong>&Yacute; nghĩa phong thuỷ</strong></p>

                    <ul>
                        <li>Đặt tr&ecirc;n b&agrave;n l&agrave;m việc, b&agrave;n họp, ph&ograve;ng kh&aacute;ch, nh&agrave; bếp,&hellip;g&oacute;p phần t&ocirc; điểm cho kh&ocirc;ng gian sống v&agrave; mang lại may mắn, tiền t&agrave;i</li>
                    </ul>

                    <p><strong>C&aacute;ch chăm s&oacute;c</strong></p>

                    <ul>
                        <li>Nước: ng&agrave;y tưới 1 lần hoặc 2 ng&agrave;y tưới 1 lần.</li>
                        <li>Đất: tơi xốp, h&uacute;t nước v&agrave; tho&aacute;t ẩm nhanh ch&oacute;ng.</li>
                    </ul>
                </div>

                <div class="product-comment product-v-desc product ">
                    <h3>Sản phẩm liên quan</h3>
                    <div class="product-container ">
                        <div class="owl-carousel-product owl-carousel owl-theme ">
                            <?php
                            $listsp1=$sp->SPTheoLoai($sanpham->getMaLoai());
                            /*--------------Sản phẩm liên quan -------------*/
                            for ($i = count($listsp1) - 1; $i > count($listsp1) - 5; $i--) {
                                $str = "<div class='item '>
                                    <div class='product-lt '>
                                        <div class='lt-product-group-image'>
                                            <a href='hoa-lan-ho-diep' title='Hoa Lan Hồ Điệp'>
                                                <img class='img-p' src='../../assets/public/images/products/" . $listsp1[$i]->getAnhDaiDien() . "'>
                                            </a>
    
                                        </div>
    
                                        <div class='lt-product-group-info '>
                                            <a href='hoa-lan-ho-diep' title='Hoa Lan Hồ Điệp' style='text-align: left; '>
                                                <h3>" . $listsp1[$i]->getTenSP() . "</h3>
                                            </a>
                                            <div class='price-box '>
                                                <p class='old-price '>
                                                    <span class='price ' style='color: #fff '>" . $listsp1[$i]->getDonGiaBan() . "₫</span>
                                                </p>
                                                <p class='special-price '>
                                                    <span class='price'>".$listsp1[$i]->getDonGiaBan()."₫</span>
                                                </p>
                                            </div>
                                            <div class='clear'></div>
                                        </div>
                                    </div>
                                </div>";
                                echo $str;
                            }
                            ?>
                            
                        </div>
                    </div>

            </form>

        </div>
    </div>
</section>
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide ",
            controlNav: "thumbnails "
        });
    });
</script>
<script src="../../assets/public/js/bootstrap.js "></script>
<script src="../../assets/public/js/app.min.js "></script>
<script src="../../assets/public/js/owl.carousel.js "></script>
<script src="../../assets/public/js/jquery.jcarousel.js "></script>
<script src="../../assets/public/js/jcarousel.connected-carousels.js "></script>
<script src="../../assets/public/js/scroll.js "></script>
<script src="../../assets/public/js/search-quick.js "></script>
<script src="../../assets/public/js/custom-owl.js "></script>
<script src="../../assets/public/js/jquery.flexslider.js "></script>
<div class='scrolltop'>
    <div class='scroll icon'><i class="fa fa-4x fa-angle-up "></i></div>
</div>