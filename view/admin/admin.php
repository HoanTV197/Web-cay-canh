<?php
session_start();
require_once '../../assets/libs/PHPExcel/PHPExcel.php';

$objPHPExcel = new PHPExcel();

if (isset($_GET['excel'])) {
    switch ($_GET['excel']) {
        case "tintuc":
            include_once './baocao/tintucExcel.php';
            break;
        case "hoadonban":
            include_once './baocao/hoadonbanExcel.php';
            break;
        case "sanpham":
            include_once './baocao/sanphamExcel.php';
            break;
        case "khachhang":
            include_once './baocao/khachhangExcel.php';
            break;
        case "nhapExcel":
            include_once './baocao/nhapExcel.php';
            break;
        case "banExcel":
            include_once './baocao/banExcel.php';
            break;
           
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Danh sách </title>
    <link rel="icon" type="image/x-icon" href="../../assets/public/images/iconu.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../assets">
    <link rel="stylesheet" href="../../assets/public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/public/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../assets/public/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/public/css/AdminLTE.css">
    <link rel="stylesheet" href="../../assets/public/css/ionicons.min.css">

    <link rel="stylesheet" href="../../assets/public/css/_all-skins.min.css">
    <script src="../../assets/public/js/loader.js"></script>
    <script src="../../assets/public/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="../../assets/public/assets/admin.css">
    <style>
        .btn-success {
            padding: 2px 10px !important;
        }

        .content-header h1,
        th,
        label {
            color: #333;
        }

        label {
            font-weight: 600 !important;
        }

        .maudo {
            color: red;
        }

        .mauxanh18 {
            color: green;
        }

        .pagination li a {
            background-color: #2dc0f7d9;
            padding: 2px 7px;
            border-radius: 50% !important;
            margin: 3px;
            cursor: pointer;
        }

        .pagination li:hover a {

            text-decoration: underline;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Vung Header -->
        <header class="main-header">
            <a href="./admin" class="logo">
                <span class="logo-lg">Quản trị hệ thống</span>
            </a>
            <nav class="navbar navbar-static-top" style="height: 52px">
                <a href="#" data-toggle="offcanvas" role="button" style="position: absolute;top: 38%;
    left: 1.5%;
    background: url('../../assets/public/images/admin/Sprites.64af8f61.svg') no-repeat -847px -35px;
    width: 16px;
    height: 14px;">
                    <!-- <span class="sr-only">Toggle navigation</span> -->
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav" style="height: 52px;  padding: 1px">
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o" style="position:absolute;
    background: url('../../assets/public/images/admin/Sprites.64af8f61.svg') no-repeat -788px -30px;right: 54%;
    width: 22px;
	height: 25px;"></i>
                                <span class="label label-warning">
                                    2 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i>
                                                2
                                                Đơn hàng chưa duyệt
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i>
                                                0
                                                Đơn hàng đang giao
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="./admin/orders">Xem</a></li>
                            </ul>
                        </li>
                        <li style="height: 52px">
                            <a target="_blank" href="./">
                                <span>Website</span>
                            </a>
                        </li>
                        <li class="dropdown user user-menu" style="height: 52px; padding: 0px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../../assets/public/images/admin/anh-kh.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">ADMIN</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="../../assets/public/images/admin/user-group.png" class="img-circle" alt="User Image">
                                    <p>ADMIN<small>0167892615</small></p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="./admin/useradmin/update/1" class="btn btn-default btn-flat">Chi
                                            tiết</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="admin/user/logout.html" class="btn btn-default btn-flat">Thoát</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- ./Vung Header -->
        <aside class="main-sidebar">

            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header">THỐNG KÊ</li>
                    <li class="treeview">
                        <a href="?admin=thongKeNhap">
                            <i class="fa fa-bar-chart"></i> <span>Thống kê nhập</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=baoCaoDoanhThu">
                            <i class="fa fa-bar-chart"></i> <span>Thống kê doanh thu</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=khachHangTN&page=1">
                            <i class="fa fa-bar-chart"></i> <span>Thống kê khách hàng tiềm năng</span>
                        </a>
                    </li>
                    <li class="header">QUẢN LÝ CỬA HÀNG</li>
                    <li class="treeview">
                        <a href="?admin=hienThiTinTuc&page=1">
                            <span>Tin tức</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=hienThiSanPham&page=1">
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=hienThiLoai&page=1">
                            <span>Loại sản phẩm</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=hienThiNCC&page=1">
                            <span>Nhà cung cấp</span>
                        </a>
                    </li>
                    <li class="header">QUẢN LÝ NGƯỜI DÙNG</li>

                    <li class="treeview">
                        <a href="?admin=hienThiTaiKhoan&page=1">
                            <i class="fa fa-envelope"></i> <span>Tài khoản</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="?admin=hienThiKhachHang&page=1">
                            <i class="fa fa-user"></i><span>Khách hàng</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=hienThiNhanVien&page=1">
                            <i class="fa fa-user"></i><span>Nhân viên</span>
                        </a>
                    </li>

                    <li class="header">Quản LÝ ĐƠN HÀNG</li>
                    <li class="treeview">
                        <a href="?admin=hienThiHoaDonNhap&page=1">
                            <i class="fa fa-user"></i><span>Hóa đơn nhập</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=hienThiHoaDonBanXN&page=1">
                            <i class="fa fa-user"></i><span>Danh sách hóa đơn chờ xác nhận</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=hienThiHoaDonBanHT&page=1">
                            <i class="fa fa-user"></i><span>Danh sách hóa đơn hoàn tất</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="?admin=hienThiHoaDonBanHUY&page=1">
                            <i class="fa fa-user"></i><span>Danh sách hóa đơn hủy</span>
                        </a>
                    </li>
                    <li><a href="admin/user/logout.html"><i class="fa fa-sign-out text-red"></i> <span>Thoát</span></a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <?php
        include_once '../../router/routerAdmin.php';
        ?>

        <!-- /.coupon-wrapper -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 2.2.3 -->
    <script src="../../assets/public/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../assets/public/js/bootstrap.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/public/js/app.min.js"></script>
</body>

</html>