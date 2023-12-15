<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách tài khoản</h1>
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
                                                <th class="text-center">Username </th>
                                                <th class="text-center">Password</th>
                                                <th class="text-center">Loại User</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../controller/TaiKhoanController.php';
                                          
                                           // lấy số trang hiện tại
                                            $currentPage=$_GET['page'];
                                            //gọi đến controller
                                             $tk= new TaiKhoanController();
                                            $listUser = $tk->getListUser($currentPage);
                                             /*Hiển thị danh sách tài khoản*/
                                             foreach ($listUser as $i) {
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getUsername() . '</td>'
                                                   . '<td class="text-center">' . $i->getPassword() . '</td>'
                                                    . '<td class="text-center">' . $i->getLoaiUser() . '</td>' 
                                                           
                                                    . "<td><a class='btn btn-success btn-xs' href='?admin=suaTaiKhoan&username=" . $i->getUsername() . "'>Sửa</a></td>
                                                <td>
                                                <a class='btn btn-danger btn-xs' href='?admin=xoaTaiKhoan&username=" . $i->getUsername() . "'>Xóa</a>
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
                                            echo '<li><a href="?admin=hienThiTaiKhoan&page=' .( $currentPage>=2?$currentPage-1:$currentPage) . '"> <</a></li>';
                                            for ($i = 1; $i <= round($sp->sumPage('User') / 10);$i++){
                                                $str = '<li><a href="?admin=hienThiTaiKhoan&page=' . $i . '">' . $i . '</a></li>';
                                                if($i>5&& $i<round($sp->sumPage('nhanvien') / 10)){
                                                    $str = '<li>...</li>';
                                                    $str = '<li><a href="?admin=hienThiTaiKhoan&page=' . round($sp->sumPage('User') / 10) . '">' . round($sp->sumPage('nhanvien') / 10) . '</a></li>';
                                                    echo $str;
                                                    break;
                                                }
                                                echo $str;
                                            }
                                            echo '<li><a href="?hienThiTaiKhoan&page=' . ($currentPage>= round($sp->sumPage('User') / 10)?$currentPage:$currentPage+1). '">></a></li>'; 
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