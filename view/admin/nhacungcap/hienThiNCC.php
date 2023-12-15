<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách nhà cung cấp</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="?admin=themNCC" role="button">
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
                                                <th class="text-center">Mã nhà cung cấp</th>
                                                <th class="text-center">Tên nhà cung cấp</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Số điện thoại</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">Ghi chú</th>
                                                <th class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../controller/NhaCungCapController.php';
                                          
                                           // lấy số trang hiện tại
                                            $currentPage=$_GET['page'];
                                            //gọi đến controller
                                             $ncc = new NhaCungCapController();
                                            $listNCC = $ncc->getAllNCC($currentPage);
                                             /*Hiển thị danh sách nhà cung cấp*/
                                             foreach ($listNCC as $i) {
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaNCC() . '</td>'
                                                    . '<td class="text-center">' . $i->getTenNCC() . '</td>' 
                                                    . '<td class="text-center">' . $i->getEmail() . '</td>'
                                                    . '<td class="text-center">' . $i->getPhone() . '</td>'
                                                     . '<td class="text-center">' . $i->getDiaChi() . '</td>'
                                                    . '<td class="text-center">' . $i->getGhiChu() . '</td>' 
                                                           
                                                    . "<td><a class='btn btn-success btn-xs' href='?admin=suaNCC&MaNCC=" . $i->getMaNCC() . "'>Sửa</a></td>
                                                <td>
                                                <a class='btn btn-danger btn-xs' href='?admin=xoaNCC&MaNCC=" . $i->getMaNCC() . "'>Xóa</a>
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
                                             <?php
                                             $n = round($ncc->sumPage() / 10);
                                            echo '<li><a href="?admin=hienThiNCC&page=' .( $currentPage>=2?$currentPage-1:$currentPage) . '"> <</a></li>';
                                            for ($i = 1; $i <= $n+1;$i++){
                                                $str = '<li><a href="?admin=hienThiNCC&page=' . $i . '">' . $i . '</a></li>';
                                                if($i>5&& $i<$n){
                                                    $str = '<li>...</li>';
                                                    $str = '<li><a href="?admin=hienThiNCC&page=' . $n . '">' . $n . '</a></li>';
                                                    echo $str;
                                                    break;
                                                }
                                                echo $str;
                                            }
                                            echo '<li><a href="?admin=hienThiNCC&page=' . ($currentPage>= $n ? $currentPage:$currentPage+1). '">></a></li>'; 
                                            ?> 
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