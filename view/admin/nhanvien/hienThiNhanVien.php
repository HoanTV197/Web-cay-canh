<style>
    .text-center img{
        width: 30px;
        height:30px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách nhân viên</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="?admin=themNhanVien" role="button">
                <span class="glyphicon glyphicon-plus"></span> Thêm mới
            </a>
            <a class="btn btn-primary btn-sm dropdown-toggle" href="">
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
                                                <th class="text-center">Mã nhân viên </th>
                                                <th class="text-center">Ảnh đại diện</th>
                                                <th class="text-center">Tên khách hàng</th>
                                                <th class="text-center">Giới tính</th>
                                                <th class="text-center">Số điện thoại</th>
                                                <th class="text-center">Ngày sinh</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">Số CCCD</th>
                                                <th class="text-center">Số tài khoản </th>
                                                <th class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../controller/NhanVienController.php';
                                          
                                           // lấy số trang hiện tại
                                            $currentPage=$_GET['page'];
                                            //gọi đến controller
                                             $nv = new NhanVienController();
                                            $listStaff = $nv->getAllStaff($currentPage);
                                             /*Hiển thị danh sách sản phẩm*/
                                             foreach ($listStaff as $i) {
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaNV() . '</td>'
                                                    . '<td class="text-center"><img src="../../assets/public/images/admin/' . $i->getAnhDaiDien() . '"></td>'
                                                    . '<td class="text-center">' . $i->getTenNV() . '</td>' 
                                                    . '<td class="text-center">' . $i->getGioiTinh() . '</td>' 
                                                    . '<td class="text-center">' . $i->getPhone() . '</td>'
                                                    . '<td class="text-center">' . $i->getNgaySinh() . '</td>'
                                                    . '<td class="text-center">' . $i->getDiaChi() . '</td>'
                                                    . '<td class="text-center">' . $i->getSoCCD() . '</td>'
                                                    . '<td class="text-center">' . $i->getSoTaiKhoanNH() . '</td>' 
                                                           
                                                    . "<td><a class='btn btn-success btn-xs' href='?admin=suaNhanVien&MaNV=" . $i->getMaNV() . "'>Sửa</a></td>
                                                <td>
                                                <a class='btn btn-danger btn-xs' href='?admin=xoaNhanVien&MaNV=" . $i->getMaNV() . "'>Xóa</a>
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
                                             $n=round($sp->sumPage('nhanvien') / 10);
                                            echo '<li><a href="?admin=hienThiNhanVien&page=' .( $currentPage>=2?$currentPage-1:$currentPage) . '"> <</a></li>';
                                            for ($i = 1; $i <=$n ;$i++){
                                                $str = '<li><a href="?admin=hienThinhanvien&page=' . $i . '">' . $i . '</a></li>';
                                                if($i>5&& $i<round($sp->sumPage('nhanvien') / 10)){
                                                    $str = '<li>...</li>';
                                                    $str = '<li><a href="?admin=hienThiNhanVien&page=' . round($sp->sumPage('nhanvien') / 10) . '">' . round($sp->sumPage('nhanvien') / 10) . '</a></li>';
                                                    echo $str;
                                                    break;
                                                }
                                                echo $str;
                                            }
                                            echo '<li><a href="?hienThiNhanVien&page=' . ($currentPage>= round($sp->sumPage('nhanvien') / 10)?$currentPage:$currentPage+1). '">></a></li>'; 
                                            ?>  -->
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
