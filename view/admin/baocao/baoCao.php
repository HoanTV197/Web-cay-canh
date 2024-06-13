<!DOCTYPE html>
<html>
<head>
    <title>Thống Kê Bán Hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thống Kê Bán Hàng</h1>
        <div class="breadcrumb" style="display:flex;">
            <form action="?admin=baoCaoDoanhThu" method="post" style="margin-right:5px;">
                <select name="year" style="padding:5px 10px;">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
                <button class="btn btn-primary btn-sm dropdown-toggle" type="submit">Xem</button>
            </form>
            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=thongKeNhap&excel=banExcel">Xuất Excel</a>
        </div>
    </section>

    <?php
    include '../../controller/HoaDonBanController.php';
    $hd = new HoaDonBanController();
    if (isset($_POST['year'])) {
        $year = $_POST['year'];
    } else {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $year = date('Y');
    }
    $dt = $hd->doanhThuHoanTat($year);
    $tongDoanhThu = 0;
    $doanhThu = array_fill(0, 13, 0);
    $sl = array_fill(0, 13, 0);
    if ($dt->num_rows > 0) {
        while ($row = $dt->fetch_assoc()) {
            $doanhThu[$row['thang']] = $row["doanhthu"] * 1000; // Nhân với 1,000 để đổi sang đơn vị triệu đồng
            $tongDoanhThu += $row["doanhthu"] * 1000; // Nhân với 1,000 để đổi sang đơn vị triệu đồng
            $sl[$row["thang"]] = $row["sl"];
        }
    }
    ?>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bán hàng & Doanh thu</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <div id="chart_div" style="width: 100%; height: 250px;"></div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header" style="color: #e90000;"><?php echo number_format($tongDoanhThu, 0, ',', '.') . ' VND'; ?></h5>
                                    <span class="description-text" style="color:#007bff; font-size:larger">Tổng doanh thu</span>
                                </div>
                            </div>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="description-block border-right" style="display: inline-flex;">
                                        <span class="description-text">Doanh thu tháng <?php echo $i; ?>:</span>
                                        <h5 class="description-header" style="color: #e90000; padding-left: 10px;"><?php echo number_format($doanhThu[$i], 0, ',', '.') . ' VND'; ?></h5>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
            ['Tháng', 'Số lượng', 'Doanh thu'],
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "['" . sprintf("%02d", $i) . "/$year', " . $sl[$i] . ", " . $doanhThu[$i] . "],\n";
            }
            ?>
        ]);

        var options = {
            title: 'Số lượng bán ra và doanh thu theo tháng',
            vAxis: {
                format: '###,### VND'
            },
            hAxis: {
                title: 'Tháng'
            },
            seriesType: 'bars'
        };

        var formatter = new google.visualization.NumberFormat({
            pattern: '###,### VND'
        });
        formatter.format(data, 2); // Định dạng cột thứ 2 (Doanh thu)

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

 <style>
    .description-block {
        display: inline-block;
        width: 100%;
        margin: 10px 0;
        text-align: center;
    }

    .description-text {
        font-size: 14px;
        font-weight: 400;
        color: #666;
    }

    .description-header {
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    .rounded {
        border-radius: 20px;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 0;
    }

    .content-wrapper {
        padding: 20px;
    }

    .content-header {
        margin-bottom: 20px;
    }

    .breadcrumb {
        display: flex;
        gap: 10px;
    }

    .breadcrumb select, .breadcrumb .btn {
        padding: 5px 10px;
    }

    .btn {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        padding: 5px 15px;
        border-radius: 4px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .small-box {
        position: relative;
        background: #ffffff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .small-box .inner {
        margin-bottom: 10px;
    }

    .small-box h3 {
        font-size: 38px;
        margin: 0;
        padding: 0;
    }

    .small-box p {
        font-size: 18px;
    }

    .small-box-footer {
        display: block;
        padding: 10px;
        background: rgba(0, 0, 0, 0.1);
        text-decoration: none;
        color: #000;
        border-radius: 0 0 20px 20px;
    }

    .small-box-footer:hover {
        background: rgba(0, 0, 0, 0.15);
    }

    .box {
        background: #ffffff;
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }
</style>
</body>
</html>