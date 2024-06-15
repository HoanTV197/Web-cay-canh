<style>
    .text-center img{
        width: 30px;
        height:30px;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách khách hàng</h1>
        <div class="breadcrumb">

            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=hienThiKhachHang&page=1&excel=khachhang">
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
                                                <th class="text-center">Ghi chú</th>
                                               
                                                <th class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../controller/KHachHangController.php';
                                          
                                           // lấy số trang hiện tại
                                            $currentPage=$_GET['page'];
                                            //gọi đến controller
                                             $kh = new KhachHangController();
                                            $listCustomer = $kh->getAllCustomer($currentPage);
                                             /*Hiển thị danh sách sản phẩm*/
                                             foreach ($listCustomer as $i) {
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaKH() . '</td>'
                                                    . '<td class="text-center"><img src="../../assets/public/images/admin/' . $i->getAnhDaiDien() . '"></td>'
                                                    . '<td class="text-center">' . $i->getTenKH() . '</td>' 
                                                    . '<td class="text-center">' . $i->getGioiTinh() . '</td>' 
                                                    . '<td class="text-center">' . $i->getEmail() . '</td>'
                                                    . '<td class="text-center">' . $i->getPhone() . '</td>'
                                                    . '<td class="text-center">' . $i->getNgaySinh() . '</td>'
                                                    . '<td class="text-center">' . $i->getDiaChi() . '</td>'
                                                    . '<td class="text-center">' . $i->getGhiChu() . '</td>' 
                                                           
                                                    . "<td><a class='btn btn-success btn-xs' href='?admin=suaKhachHang&MaKH=" . $i->getMaKH() . "'>Sửa</a></td>
                                                <td>
                                                <a class='btn btn-danger btn-xs' href='?admin=xoaKhachHang&MaKH=" . $i->getMaKH() . "'>Xóa</a>
                                                </td>
                                                </tr>";
                                                echo $str;
                                            }  
                                            ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                            <!-- --------------------------------Phân trang----------------------------------- -->
                                            <!-- <?php
                                            echo '<li><a href="?admin=hienThiKhachHang&page=' .( $currentPage>=2?$currentPage-1:$currentPage) . '"> <</a></li>';
                                            for ($i = 1; $i <= round($sp->sumPage('khachhang') / 10)+1;$i++){
                                                $str = '<li><a href="?admin=hienThiKhachHang&page=' . $i . '">' . $i . '</a></li>';
                                                if($i>5&& $i<round($sp->sumPage('KhachHang') / 10)){
                                                    $str = '<li>...</li>';
                                                    $str = '<li><a href="?admin=hienThiKhachHang&page=' . round($sp->sumPage('khachhang') / 10) . '">' . round($sp->sumPage('khachhang') / 10) . '</a></li>';
                                                    echo $str;
                                                    break;
                                                }
                                                echo $str;
                                            }
                                            echo '<li><a href="?hienThiKhachHang&page=' . ($currentPage>= round($sp->sumPage('khachhang') / 10)?$currentPage:$currentPage+1). '">></a></li>'; 
                                            ?> -->
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