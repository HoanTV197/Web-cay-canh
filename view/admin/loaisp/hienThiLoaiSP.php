<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách loại sản phẩm</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="?admin=themLoaiSP" role="button">
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
                                                <th class="text-center">Mã loại </th>
                                                <th class="text-center">Tên loại </th>
                                                <th class="text-center">Ghi chú</th>
                                                <th class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../../controller/LoaiSPController.php';
                                          
                                           // lấy số trang hiện tại
                                            $currentPage=$_GET['page'];
                                            //gọi đến controller
                                             $loai = new LoaiSPController();
                                            $listLoai = $loai->getAllLoai($currentPage);
                                             /*---Hiển thị danh sách loại------*/
                                             foreach ($listLoai as $i) {
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaLoai() . '</td>'
                                                   . '<td class="text-center">' . $i->getTenLoai() . '</td>' 
                                                   . '<td class="text-center"></td>' 
                                                   . "<td><a class='btn btn-success btn-xs' href='?admin=suaLoaiSP&MaLoai=" . $i->getMaLoai() . "'>Sửa</a></td>
                                                <td>
                                                <a class='btn btn-danger btn-xs' href='?admin=xoaLoaiSP&MaLoai=" . $i->getMaLoai() . "'>Xóa</a>
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
                                             $n=round($loai->sumPage() / 10);
                                            echo '<li><a href="?admin=hienThiLoaiSP&page=' .( $currentPage>=2?$currentPage-1:$currentPage) . '"> <</a></li>';
                                            for ($i = 1; $i <=$n+1 ;$i++){
                                                $str = '<li><a href="?admin=hienThiLoaiSP&page=' . $i . '">' . $i . '</a></li>';
                                                if($i>5&& $i<$n){
                                                    $str = '<li>...</li>';
                                                    $str = '<li><a href="?admin=hienThiLoaiSP&page=' . $n . '">' . $n . '</a></li>';
                                                    echo $str;
                                                    break;
                                                }
                                                echo $str;
                                            }
                                            echo '<li><a href="?hienThiLoaiSP&page=' . ($currentPage>= $n?$currentPage:$currentPage+1). '">></a></li>'; 
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
