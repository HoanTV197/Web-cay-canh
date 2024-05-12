<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php
                            include_once '../../database/DB.php';
                            $db = new DB();
                            $sp = $db->executeSQL("SELECT COUNT(MaSP) FROM sanpham;");
                            while ($row = $sp->fetch_assoc()) {
                                echo $row['COUNT(MaSP)'];
                            }

                            ?>
                        </h3>
                        <p>Sản phẩm</p>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                    <a href="?admin=hienThiSanPham&page=1" class="small-box-footer">Danh sách sản phẩm</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3> <?php
                                $tt = $db->executeSQL("SELECT COUNT(MaTinTuc) FROM tintuc;");
                                while ($row = $tt->fetch_assoc()) {
                                    echo $row['COUNT(MaTinTuc)'];
                                }

                                ?></h3>
                        <p>Bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-chat "></i>
                    </div>
                    <a href="?admin=hienThiTinTuc&page=1" class="small-box-footer">Danh sách bài viết</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3> <?php
                                $kh = $db->executeSQL("SELECT COUNT(MaKH) FROM khachhang;");
                                while ($row = $kh->fetch_assoc()) {
                                    echo $row['COUNT(MaKH)'];
                                }
                                ?></h3>
                        <p>Khách hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="?admin=hienThiKhachHang&page=1" class="small-box-footer">Danh sách khách hàng</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php
                            $hd = $db->executeSQL("SELECT COUNT(MaHDB) FROM hoadonban;");
                            while ($row = $hd->fetch_assoc()) {
                                echo $row['COUNT(MaHDB)'];
                            }
                            ?></h3>
                        <p>Đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cube"></i>
                    </div>
                    <a href="?admin=hienThiHoaDonBanXN&page=1" class="small-box-footer">Danh sách đơn hàng</a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <section class="content-header">
        <h1>Thống Kê bán </h1>

        <div class="breadcrumb" style="display:flex;">
            <form action="?admin=baoCaoDoanhThu" method="post" style="margin-right:5px;">
                <select name="year" style="padding:5px 10px;">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
                <button class="btn btn-primary btn-sm dropdown-toggle" type="submit">Xem</button>
            </form>
            
            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=thongKeNhap&excel=banExcel">
                Xuất Exel
            </a>
        </div>
    </section>
    <?php
    include '../../controller/HoaDonBanController.php';
    $hd = new HoaDonBanController();
    if (isset($_POST['year'])) {
        $nam = $_POST['year'];
        $year = $_POST['year'];
        
    } else {
        //lấy ra thời gian hiện tại
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $NgayTao = date('Y-m-d H:i:s');
        $nam = $NgayTao;
        $year = 2024;
    }
    //tính doanh thu
    $dt = $hd->doanhThu($nam);
    $tongDoanhThu = 0;
    $doanhThu = array_fill(0, 13, 0);
    $sl =  array_fill(0, 13, 0);
    if ($dt->num_rows > 0) {
        while ($row = $dt->fetch_assoc()) {
            $doanhThu[$row['thang']] = $row["doanhthu"];
            $tongDoanhThu += $row["doanhthu"];
            $sl[$row["thang"]] = $row["sl"];
        }
    }
    ?>
    <section class="content">
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bán hàng & Doanh thu</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <div id="chart_div" style="width: 100%; height: 250px;">

                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header" style="color: #e90000;"><?php echo $tongDoanhThu . '' ?> VNĐ</h5>
                                    <span class="description-text">Tổng doanh thu</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 1 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[1] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 2 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[2] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 3 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[3] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 4 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[4] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 5 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[5] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 6 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[6] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 7 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[7] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 8 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[8] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 9 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[9] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 10 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[10] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 11 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[11] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 12 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[12] . ''; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php

echo " <script>
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
                var data = google.visualization.arrayToDataTable([
                    ['Tháng','Số lượng', 'Doanh Thu'],
                    ['01/".$year."',$sl[1],$doanhThu[1]],
                    ['02/".$year."',$sl[2], $doanhThu[2]],
                    ['03/".$year."',$sl[3], $doanhThu[3]],
                    ['04/".$year."',$sl[4], $doanhThu[4]],
                    ['05/".$year."',$sl[5], $doanhThu[5]],
                    ['06/".$year."',$sl[6], $doanhThu[6]],
                    ['07/".$year."',$sl[7], $doanhThu[7]],
                    ['08/".$year."',$sl[8], $doanhThu[8]],
                    ['09/".$year."',$sl[9], $doanhThu[9]],
                    ['10/".$year."',$sl[10], $doanhThu[10]],
                    ['11/".$year."',$sl[11], $doanhThu[11]],
                    ['12/".$year."',$sl[12], $doanhThu[12]],
                ])
                var options = {
                 title: 'Số lượng bán ra từ 01/2024 - 12/2024',
                    seriesType: 'bars'
                };

                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>";
?>

</div>