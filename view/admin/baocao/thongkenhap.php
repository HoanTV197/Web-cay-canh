<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thống Kê nhập </h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=thongKeNhap&excel=nhapExcel">
                Xuất Exel
            </a>
        </div>
    </section>
    <?php
    include '../../controller/HoaDonNhapController.php';
    $hd = new HoaDonNhapController();
    $dt = $hd->doanhThu();
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
                        <h3 class="box-title">Doanh thu</h3>
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
                                    <h5 class="description-header" style="color: #e90000;"><?php echo $tongDoanhThu . '.000' ?> VNĐ</h5>
                                    <span class="description-text">Tổng doanh thu</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 1 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[1] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 2 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[2] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 3 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[3] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 4 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[4] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 5 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[5] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 6 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[6] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 7 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[7] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 8 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[8] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 9 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[9] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 10 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[10] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 11 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[11] . '0'; ?> VNĐ</h5>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="description-block border-right" style="display: inline-flex;">
                                <span class="description-text">Doanh thu tháng 12 : </span>
                                <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo $doanhThu[12] . '0'; ?> VNĐ</h5>
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
                    ['01/2023',$sl[1],$doanhThu[1]],
                    ['02/2023',$sl[2], $doanhThu[2]],
                    ['03/2023',$sl[3], $doanhThu[3]],
                    ['04/2023',$sl[4], $doanhThu[4]],
                    ['05/2023',$sl[5], $doanhThu[5]],
                    ['06/2023',$sl[6], $doanhThu[6]],
                    ['07/2023',$sl[7], $doanhThu[7]],
                    ['08/2023',$sl[8], $doanhThu[8]],
                    ['09/2023',$sl[9], $doanhThu[9]],
                    ['10/2023',$sl[10], $doanhThu[10]],
                    ['11/2023',$sl[11], $doanhThu[11]],
                    ['12/2023',$sl[12], $doanhThu[12]],
                ])
                var options = {
                 title: 'Số lượng bán ra từ 01/2023 - 12/2023',
                    seriesType: 'bars'
                };

                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>";
?>

</div>