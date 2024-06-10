<style>
    .price-box {
        margin:0px !important;
    }
    .text-center .them{
       color:white;
        padding: 6px;
        font-size: 13px;
        background-color:  #0ce90a;
        border: none;
    }
</style>
<section id=" menu-slider ">
    <div class=" slider ">
        <div class=" container ">
            <div class=" col-xs-12 col-sm-12 col-md-3 col-lg-3 list-menu pull-left " style=" height: 321px; ">
                <img style=" width: 100%; height: 160px; " src="https://file.hstatic.net/1000273748/file/cay_van_phong_1.gif ">
                <img style=" width: 100%; height: 160px; " src="http://file.hstatic.net/1000273748/article/cay-canh-van-phong.jpg ">
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-9 col-lg-9 slider-main pull-left ">

                <div class=" owl-carousel-slider owl-carousel owl-theme ">
                    <div class=" item "><img src=" ../../assets/public/images/banners/unnamed.jpg "></div>
                    <div class=" item "><img src=" ../../assets/public/images/banners/banner-cay-canh-van-phong-1.jpg ">
                    </div>
                    <div class=" item "><img src=" ../../assets/public/images/banners/cay-canh-san-vuon.jpg "></div>
                </div>
            </div>
        </div>
    </div>
    <div class=" container " style=" margin-top: 20px; ">
        <div class=" sale-title ">
            <span>SẢN PHẨM BÁN CHẠY</span>
        </div>
    </div>
    <div class=" container " style=" margin-bottom: 20px; ">
        <div class=" owl-carousel owl-carousel-product owl-theme " style=" border: 1px solid #0f9ed8; ">
        <!-- -----------Sản phẩm bán chạy-------------------- -->
            <?php
            include '../../controller/SanPhamController.php';
            $sanpham = new SanPhamController();
            $spBanChay = $sanpham->SPBanChay();
            if ($spBanChay->num_rows > 0) {
                while ($row = $spBanChay->fetch_assoc()) {
                    $str = "<div class=' item ' style=' margin: 0px;'>
                <div class='products-sale'>
                    <div class='lt-product-group-image'>
                        <a href='?pages=chiTietSP&MaSP=" . $row["MaSP"] . "' title=' Cây Lan Hạt Dưa '>
                            <img class=' img-p' src='../../assets/public/images/products/" . $row["AnhDaiDien"] . "'>
                        </a>
                    </div>
                    <div class='lt-product-group-info'>
                        <a href='?pages=chiTietSP&MaSP=" . $row["MaSP"] . "' title='Cây Lan Hạt Dưa' style=' text-align: left;'>
                            <h3>" . $row["TenSP"] . "</h3>
                        </a>
                        <div class='price-box'>

                            <p class=' old-price '>
                                <span class='price'>" . ($row["DonGiaBan"] + 10) . ",000₫</span>
                            </p>
                            <p class='special-price'>
                                <span class='price '>
                                " . $row["DonGiaBan"] . "₫</span>
                            </p>
                        </div>
                        <div class='clear'></div>
                    </div>
                </div>
            </div>";
                    echo $str;
                }
            }
            ?>

        </div>
    </div>

    <div class=" container " style=" margin-top: 20px; ">
        <div class=" sale-title ">
            <span>SẢN PHẨM MỚI</span>
        </div>
    </div>
    <div class=" container " style=" margin-bottom: 20px; ">
        <div class=" owl-carousel owl-carousel-product owl-theme " style=" border: 1px solid #0f9ed8; ">
        <!-- ---------Sản phẩm mới------------ -->
            <?php
            $spMoi = $sanpham->getAllProduct1();
            for ($i = count($spMoi) - 1; $i > count($spMoi) - 6; $i--) {
                $str = "<div class='item' style=' margin: 0px; '>
            <div class='products-sale'>
                <div class='lt-product-group-image'>
                    <a href='?pages=chiTietSP&MaSP=" . $spMoi[$i]->getMaSP() . "' title=' Cây Lan Hạt Dưa '>
                        <img class='img-p' src='../../assets/public/images/products/" . $spMoi[$i]->getAnhDaiDien() . "'>
                    </a>
                   
                </div>
                <div class=' lt-product-group-info '>
                    <a href='?pages=chiTietSP&MaSP=" . $spMoi[$i]->getMaSP() . "' title=' Cây Lan Hạt Dưa' style=' text-align: left; '>
                        <h3>" . $spMoi[$i]->getTenSP() . "</h3>
                    </a>
                    <div class='price-box'>
                        <p class='old-price'>
                            <span class='price'>" . ($spMoi[$i]->getDonGiaBan() + 10) . "000₫</span>
                        </p>
                        <p class='special-price '>
                            <span class='price' >" . $spMoi[$i]->getDonGiaBan() . "₫</span>
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
</section>

</section>
<div id=" content ">
    <div class=" container ">
        <div class=" list-product ">
            <div class=" list-header-z ">
                <h2><a href=" cay-canh-ngoai-that ">Cây cảnh ngoại thất nổi bật</a></h2>
                <ul class=" sub-category ">
                    <li>
                        <a href=" san-pham/cay-canh-vuon " title=" Cây cảnh vườn " class=" ws-nw overflow ellipsis ">
                            Cây cảnh vườn                                    
                        </a>
                        </li>
                    <li>
                        <a href=" san-pham/cay-canh-nghe-thuat " title=" Cây cảnh nghệ thuật " class=" ws-nw overflow ellipsis ">
                            Cây cảnh nghệ thuật 
                        </a>
                    </li>
                </ul>
            </div>
            <div class=" product-container ">

                <!-- -------Sản phẩm loại 1--------------- -->
                <?php
                $spLoai1 = $sanpham->SPTheoLoai('Loai001');
                for ($i = 0; $i < count($spLoai1); $i++) {
                   
                    echo " <div class=' p-box-5 '>
                    <div class='product-lt'>
                        <div class='lt-product-group-image '>
                            <a href='?pages=chiTietSP&MaSP=".$spLoai1[$i]->getMaSP()."' title='Hoa Lan Hồ Điệp'>
                                <img class='img-p' src='../../assets/public/images/products/".$spLoai1[$i]->getAnhDaiDien()."' >
                            </a>

                        </div>

                        <div class='lt-product-group-info'>
                            <a href='?pages=chiTietSP&MaSP=".$spLoai1[$i]->getMaSP()."' title='Hoa Lan Hồ Điệp' style='text-align: left;'>
                                <h3>".$spLoai1[$i]->getTenSP()."</h3>
                            </a>
                            <div class='price-box'>
                                <p class='old-price'>
                                    <span class='price' style='color: #fff'>".($spLoai1[$i]->getDonGiaBan()+10).",000₫</span>
                                </p>
                                <p class='special-price '>
                                    <span class='price'>".$spLoai1[$i]->getDonGiaBan()."₫</span>
                                </p>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </div>
                </div>";
                }
                ?>
                
            </div>
        </div>
        <div class=" list-product ">
            <div class=" list-header-z ">
                <h2><a href=" cay-canh-noi-that ">Cây cảnh nội thất nổi bật</a></h2>
                <ul class=" sub-category ">
                    <li>
                        <a href=" san-pham/cay-canh-de-ban " title=" Cây cảnh để bàn " class=" ws-nw overflow ellipsis ">
                            Cây cảnh để bàn                                   
                         </a>
                    </li>
                    <li>
                        <a href=" san-pham/ua-chuong-trong-nha " title=" Ưa chuộng trong nhà " class=" ws-nw overflow ellipsis ">
                            Ưa chuộng trong nhà 
                        </a>
                    </li>
                    <li>
                        <a href=" san-pham/cay-canh-van-phong " title=" Cây cảnh văn phòng " class=" ws-nw overflow ellipsis ">
                            Cây cảnh văn phòng                
                        </a>
                    </li>
                </ul>
                    </div>
                    <div class=" product-container ">
                       
                            <!-- -------Sản phẩm loại 2--------------- -->
                            <?php
                            $spLoai2 = $sanpham->SPTheoLoai('Loai002');
                            for ($i = 0; $i < count($spLoai1); $i++) {
                                $itemCart = [
                                    "code" => $spLoai2[$i]->getMaSP(),
                                    "name" => $spLoai2[$i]->getTenSP(),
                                    "image" => $spLoai2[$i]->getAnhDaiDien(),
                                    "price" => $spLoai2[$i]->getDonGiaBan(),
                                    "quantity" => 1
                                ];
                                echo " <div class=' p-box-5 '>
                                <div class='product-lt'>
                                    <div class='lt-product-group-image '>
                                        <a href='?pages=chiTietSP&MaSP=".$spLoai2[$i]->getMaSP()."' title='Hoa Lan Hồ Điệp'>
                                            <img class='img-p' src='../../assets/public/images/products/".$spLoai2[$i]->getAnhDaiDien()."' >
                                        </a>
            
                                    </div>
            
                                    <div class='lt-product-group-info'>
                                        <a href='?pages=chiTietSP&MaSP=".$spLoai2[$i]->getMaSP()."' title='Hoa Lan Hồ Điệp' style='text-align: left;'>
                                            <h3>".$spLoai2[$i]->getTenSP()."</h3>
                                        </a>
                                        <div class='price-box'>
                                            <p class='old-price'>
                                                <span class='price'>".($spLoai2[$i]->getDonGiaBan()+10).",000₫</span>
                                            </p>
                                            <p class='special-price '>
                                                <span class='price'>".$spLoai2[$i]->getDonGiaBan()."₫</span>
                                            </p>
                                        </div>
                                        <div class='text-center'><button type='button' class='them' onClick='addCart(".json_encode($itemCart).")'>Thêm vào giỏ hàng</button></div>
                                                
                                        <div class='clear'></div>
                                    </div>
                                </div>
                            </div>";
                            }
                            ?>
   
                    </div>
        </div>
    </div>
</div>

<div class=" home-blog ">
    <div class=" container ">
            <div class=" row-p ">
                <div class=" text-center ">
                    <h2 class=" sectin-title title title-blue ">Tin tức mới nhất</h2>
                </div>
            </div>
            <div class=" blog-content ">
                <?php
                /*--------- ---------------- Danh sách TIn tức-------------------------  */
                $tintuc = $sanpham->layTinTuc();
                $start = max(count($tintuc) - 4, 0); // Ensure we start at a valid index and avoid negative
                for ($i = count($tintuc) - 1; $i >= $start; $i--) {
                    if (isset($tintuc[$i])) { // Check if the index exists and is not null
                        echo $str = " <div class=' col-xs-12 col-12 col-sm-6 col-md-2 col-lg-2' style=' margin: 5px;'>
                        <div class='latest'>
                            <a href='?pages=chiTietTinTuc&MaTinTuc=". $tintuc[$i]->getMaTinTuc()."'>
                                <div class='tempvideo'>
                                    <img width='98%' src='../../assets/public/images/products/" . $tintuc[$i]->getAnh() . "'>
                                </div>
                                <h3 style=' color: #999;'>" . $tintuc[$i]->getTieuDe() . "</h3>
                            </a>
                        </div>
                    </div>";
                    }
                }
                ?>
                           
                 </div>
        </div>
    </div>
    <div class=" adv ">
        <section id=" service " style=" margin: 20px; ">
            <div class=" container ">
                <div class=" row ">
                    <div id=" service_home " class=" clearfix ">
                        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10 ">
                            <div class=" service_item ">
                            <div class=" icon icon_product ">
                                <img src=" ../../assets/public/images/icon_142e7.png " alt=" ">
                            </div>
                            <div class=" description_icon ">
                                <span class=" large-text ">
                                    Miễn phí giao hàng
                                </span>
                                <span class=" small-text ">
                                    Cho hóa đơn từ 100,000,000 đ
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10 ">
                        <div class=" service_item ">
                            <div class=" icon icon_product ">
                                <img src=" ../../assets/public/images/icon_242e7.png " alt=" ">
                            </div>
                            <div class=" description_icon ">
                                <span class=" large-text ">
                                    Giao hàng trong ngày
                                </span>
                                <span class=" small-text ">
                                    Với tất cả đơn hàng
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10 ">
                        <div class=" service_item ">
                            <div class=" icon icon_product ">
                                <img src=" ../../assets/public/images/icon_342e7.png " alt=" ">
                            </div>
                            <div class=" description_icon ">
                                <span class=" large-text ">
                                    Sản phẩm an toàn
                                </span>
                                <span class=" small-text ">
                                    Cam kết chính hãng
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Begin-->
    <!--End-->
</div>