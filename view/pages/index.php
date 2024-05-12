<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        Website cây cảnh Bonsai
    </title>
    <link rel="icon" type="image/x-icon" href="../../assets/public/images/cart2.png">
    <link rel="stylesheet" href="">
    <link href="../../assets/public/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/public/css/font-awesome.css" rel="stylesheet">
    <link href="../../assets/public/css/lte.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="../../assets/public/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../../assets/public/css/AdminLTE.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/public/css/style-jc.css">
    <link href="../../assets/public/css/menu-tab.css" rel="stylesheet">
    <link href="../../assets/public/css/style.css" rel="stylesheet">
    <link href="../../assets/public/css/jquery.bxslider.css" rel="stylesheet">
    <link href="../../assets/public/css/flexslider.css" rel="stylesheet">
    <script src="../../assets/public/js/jquery-2.2.3.min.js"></script>
    <script src="../../assets/public/js/cart.js"></script>
    <style>
        .logo-search {
            height: 124px;
        }
    </style>
    </head>

    <body>

    <section id="header">
        <nav class=" navbar " style=" z-index: 9999 ">
            <div class=" container ">
                <div class=" col-md-12 col-lg-12 ">
                    <div id=" navbar " class=" collapse navbar-collapse ">

                        <ul class=" nav navbar navbar-nav pull-right " id=" nav2 ">
                            <li><a href='./view/login/regiter.php'>Đăng ký</a></li>
                            <li><a href='http://localhost/btlPHP/index.php'>Đăng xuất</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <section class=" logo-search ">
        <div class=" container ">
            <div class=" col-xs-12 col-sm-12 col-md-3 col-lg-3 logo ">
                <a href=" ../../assets/ "><img src=" ../../assets/public/images/logo1.png " alt=" Logo Construction "></a>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-5 col-lg-5 search ">
                <div class=" contact-row ">
                    <div class=" phone inline ">
                        <i class=" icon fa fa-phone "></i> 0383971115
                    </div>
                    <div class=" contact inline ">
                        <i class=" icon fa fa-envelope "></i> WebsitebancaycanhBonsai@gmail.com
                    </div>
                </div>
                <form action="?pages=timKiemSP&page=1 " method="post" role=" form ">
                    <div class=" input-search ">
                        <input type=" text " class=" form-control " id=" search_text " name="TenSP" placeholder=" Nhập từ khóa để tìm kiếm... ">
                        <button>
                            <i class=" fa fa-search "></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class=" col-lg-3 col-md-4 col-sm-4 col-xs-12 hidden-xs " style=" padding: 24px; ">
                <!-- Cart -->
                <div class=" cart_header ">
                    <a href=" ?pages=giohang" title=" Giỏ hàng ">
                        <span class=" cart_header_icon ">
                            <img src=" ../../assets/public/images/cart2.png " alt=" Cart ">
                        </span>
                        <span class=" box_text ">
                            <strong class=" cart_header_count ">Giỏ hàng </strong>
                            <span class=" cart_price ">
                                <p></p>
                            </span>
                        </span>
                    </a>
                    <div class=" cart_clone_box ">
                        <div class=" cart_box_wrap hidden ">
                            <div class=" cart_item original clearfix ">
                                <div class=" cart_item_image ">
                                </div>
                                <div class=" cart_item_info ">
                                    <p class=" cart_item_title "><a href=" " title=" "></a></p>
                                    <span class=" cart_item_quantity "></span>
                                    <span class=" cart_item_price "></span>
                                    <span class=" remove "></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Cart -->
                <!-- Account -->
                <div class=" user_login ">
                    <a href="?pages=login " title=" Tài khoản ">
                        <div class=" user_login_icon ">
                            <img src=" ../../assets/public/images/user.png " alt=" Cart ">
                        </div>
                        <div class=" box_text ">
                            <strong>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                } else {
                                    echo 'Tài khoản';
                                }
                                ?>
                            </strong>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id=" menu-slider ">
        <div class=" menu-pri ">
            <div class=" container ">
                <div class=" panel-left " style=" background: #0f9ed8; ">
                    <!--MOBILE-->
                    <nav class=" navbar navbar-default hidden-md hidden-lg " role=" navigation ">
                        <div class=" container-fluid " style=" background-color: #0f9ed8; ">
                            <div class=" navbar-header ">
                                <button type=" button " class=" navbar-toggle " data-toggle=" collapse " data-target=".navbar-ex1-collapse ">
                                    <span class=" icon-bar "></span>
                                    <span class=" icon-bar primary-color "></span>
                                    <span class=" icon-bar primary-color "></span>
                                    <span class=" icon-bar primary-color "></span>
                                </button>
                                <a class=" navbar-brand " style=" color: #fff; " href=" # ">Danh mục sản phẩm</a>
                            </div>
                            <div class=" collapse navbar-collapse navbar-ex1-collapse hidden-md hidden-lg ">

                                <ul class=" nav navbar-nav ">
                                    <li class="dropdown "><a href='san-pham/cay-canh-ngoai-that' class='dropdown-toggle' data-toggle='dropdown'>Cây cảnh ngoại
                                            thất<i class="fa fa-angle-right pull-right " aria-hidden=" true "></i></a>
                                        <ul class="dropdown-menu ">
                                            <li><a href='san-pham/cay-canh-nghe-thuat'> Cây cảnh nghệ thuật</a></li>
                                            <li><a href='san-pham/cay-canh-vuon'> Cây cảnh vườn</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown "><a href='san-pham/cay-canh-noi-that' class='dropdown-toggle' data-toggle='dropdown'>Cây cảnh nội
                                            thất<i class="fa fa-angle-right pull-right " aria-hidden=" true "></i></a>
                                        <ul class="dropdown-menu ">
                                            <li><a href='san-pham/ua-chuong-trong-nha'> Ưa chuộng trong nhà</a></li>
                                            <li><a href='san-pham/cay-canh-de-ban'> Cây cảnh để bàn</a></li>
                                            <li><a href='san-pham/cay-canh-van-phong'> Cây cảnh văn phòng</a></li>
                                        </ul>
                                    </li>
                                    <li class="
        dropdown "><a href='san-pham/cay-giong' class='dropdown-toggle' data-toggle='dropdown'>Cây giống</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                    <!--MD LG-->
                </div>
                <div class=" col-md-12 col-lg-12 panel-right hidden-xs text-center " style=" background: #0f9ed8; ">
                    <ul class=" menu-right " style=" display: inline-block; ">
                        <li class=" pull-left "><a href="?pages=trangchu ">Trang chủ</a></li>
                        <li class=" pull-left "><a href="?pages=sanpham&page=1">Sản phẩm</a></li>
                        <li class=" pull-left "><a href='?pages=sanpham&page=1'> Cây cảnh để bàn</a></li>
                        <li class=" pull-left "><a href='?pages=sanpham&page=1'> Cây cảnh nghệ thuật</a></li>
                        <li class=" pull-left "><a href="?pages=tintuc&page=1 ">Tin tức</a></li>
                        <li class=" pull-left "><a href="?pages=gioithieu">Giới thiệu</a></li>
                        <li class=" pull-left "><a href="?pages=lienhe">Liên hệ</a></li>
                        <li class=" pull-left "><a href="?pages=lichSuMuaHang&page=1">Lịch sử mua hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--CONTENT-->
    <?php
    include '../../router/router.php';
    ?>
    <!--FOOTER-->
    <footer id=" footer ">
        <div class=" news-social ">
            <div class=" container ">
                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <!-- <ul class=" list-unstyled social pull-right ">
                        <li><a href=" # "><i class=" fab fa-facebook-f "></i></a></li>
                        <li><a href=" # "><i class=" fab fa-twitter "></i></a></li>
                        <li><a href=" # "><i class=" fab fa-google-plus-g "></i></a></li>
                        <li><a href=" # "><i class=" fab fa-youtube "></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
        <div class=" top-footer ">
            <div class=" container ">
                <div class=" col-xs-12 col-sm-12 col-md-6 ">
                    <div class=" col-xs-12 col-sm-6 ">
                      
                    </div>
                    <div class=" col-xs-12 col-sm-6 ">
                        <div class=" f-contact ">
                            <h3>Thông tin liên hệ</h3>
                            <ul class=" list-unstyled ">
                                <li class=" clearfix ">
                                    <i class=" fa fa-map-marker "></i>
                                    <span>Website cây cảnh - chuyên cung cấp, bán cây cảnh</span>
                                </li>
                                <li class=" clearfix ">
                                    <i class=" fa fa-phone "></i>
                                    <span>0383971115 - 0383971115</span>
                                </li>
                                <li class=" clearfix ">
                                    <i class=" fa fa-envelope "></i>
                                    <span><a href=" # "> WebsitebancaycanhBonsai@gmail.com</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" col-xs-12 col-sm-12 col-md-6 ">
                    <div class=" col-xs-12 col-sm-6 ">
                        <h3 class=" footer-title ">HỖ TRỢ KHÁCH HÀNG</h3>
                        <ul class=" list-unstyled linklists ">
                            <li><a href=" chinh-sach ">Hướng dẫn thanh toán</a></li>
                            <li><a href=" chinh-sach ">Hướng dẫn đặt hàng</a></li>
                            <li><a href=" dieu-khoan ">Điều khoản</a></li>
                        </ul>
                    </div>
                    <div class=" col-xs-12 col-sm-6 ">
                        <iframe src="
        https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=200&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId " width="
        340 " height=" 200 " style=" border:none;overflow:hidden " scrolling=" no " frameborder="
        0 " allowTransparency=" true " allow=" encrypted-media "></iframe>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src=" ../../assets/public/js/bootstrap.js ">
    </script>
    <script src=" ../../assets/public/js/app.min.js "></script>
    <script src=" ../../assets/public/js/owl.carousel.js "></script>
    <script src=" ../../assets/public/js/jquery.jcarousel.js "></script>
    <script src=" ../../assets/public/js/jcarousel.connected-carousels.js "></script>
    <script src=" ../../assets/public/js/scroll.js "></script>
    <script src=" ../../assets/public/js/search-quick.js "></script>
    <script src=" ../../assets/public/js/custom-owl.js "></script>
    <script src=" ../../assets/public/js/jquery.flexslider.js "></script>
    <div class=' scrolltop'>
        <div class='scroll icon'><i class=" fa fa-4x fa-angle-up "></i></div>
    </div>
    </body>

</html>