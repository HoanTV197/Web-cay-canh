<style>
    .text-center img{
        width: 30px;
        height:30px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách khách hàng tiềm năng</h1>
        <div class="breadcrumb" style="display:flex;">
        <form action="?admin=baoCaoDoanhThu" method="post" style="margin-right:5px; ">
               <input type='text' name="search" placeholder="search" style="padding:5px;"/>
                <button class="btn btn-primary btn-sm dropdown-toggle" type="submit">Search</button>
            </form>
            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=hienThiKhachHang&page=1&excel=khachhangTN">
                Xuất Exel
            </a>
        </div>
    </section>
    <!-- Main coupon -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row" style='padding:0px; margin:0px;'>
                                <!--ND-->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mã khách hàng</th>
                                                <th class="text-center">Ảnh đại diện</th>
                                                <th class="text-center">Tên khách hàng</th>
                                                <th class="text-center">Giới tính</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Số điện thoại</th>
                                                <th class="text-center">Ngày sinh</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">Tổng tiền</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../controller/HoaDonBanController.php';
                                          
                                            //gọi đến controller
                                             $kh = new HoaDonBanController();
                                            $listCustomer = $kh->getListKHTN();
                                           // echo count($listCustomer);
                                             /*Hiển thị danh sách sản phẩm*/
                                            while ($row = $listCustomer->fetch_assoc()) {
                                                echo $str = '<tr>'
                                                . '<td class="text-center">' . $row['MaKH'] . '</td>'
                                                . '<td class="text-center"><img src="../../assets/public/images/admin/' .  $row['AnhDaiDien']. '"></td>'
                                                . '<td class="text-center">' . $row['TenKH'] . '</td>' 
                                                . '<td class="text-center">' . $row['GioiTinh'] . '</td>' 
                                                . '<td class="text-center">' .  $row['email'] . '</td>'
                                                . '<td class="text-center">' .  $row['Phone'] . '</td>'
                                                . '<td class="text-center">' .  $row['NgaySinh'] . '</td>'
                                                . '<td class="text-center">' . $row['DiaChi'] . '</td>'
                                                . '<td class="text-center">' .  $row['TongTien'] . '</td>' 
                                                       
                                              
                                            ."</tr>";
                                            }
                                            
                                            ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                           
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.ND -->
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
    <!-- /.coupon -->
</div>