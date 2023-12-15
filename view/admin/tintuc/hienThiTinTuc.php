<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh sách tin tức</h1>
        <div class="breadcrumb">

            <a class="btn btn-primary btn-sm" href="?admin=themTinTuc" role="button">
                <span class="glyphicon glyphicon-plus"></span> Thêm mới
            </a>
          
            <a class="btn btn-primary btn-sm dropdown-toggle" href="?admin=hienThiTinTuc&page=1&excel=tintuc">
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
                                                <th class="text-center">Mã tin tức </th>
                                                <th class="text-center">Ảnh </th>
                                                <th class="text-center">Tiêu đề</th>
                                                <th class="text-center">Nội dung</th>
                                                <th class="text-center">Mô tả tin tức</th>
                                                <th class="text-center">Ngày đăng</th>   
                                                <th class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                         include_once '../../controller/TinTucController.php';
                                         
                                         // lấy số trang hiện tại
                                          $currentPage=$_GET['page'];
                                          //gọi đến controller
                                           $tt = new TinTucController();
                                          $listNews = $tt->getAllNews($currentPage);
                                             /*---Hiển thị danh sách tin tức ------*/
                                             foreach ($listNews as $i) {
                                                $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaTinTuc() . '</td>'
                                                    . '<td class="text-center"><img src="../../assets/public/images/products/' . $i->getAnh() . '"></td>'
                                                    . '<td class="text-center">' . $i->getTieuDe() . '</td>' 
                                                    . '<td class="text-center">' . $i->getNoiDung() . '</td>' 
                                                    . '<td class="text-center">' . $i->getmoTaNgan() . '</td>'
                                                    . '<td class="text-center">' . $i->getNgayTao() . '</td>'         
                                                    . "<td><a class='btn btn-success btn-xs' href='?admin=suaTinTuc&MaTinTuc=" . $i->getMaTinTuc() . "'>Sửa</a></td>
                                                <td>
                                                <a class='btn btn-danger btn-xs' href='?admin=xoaTinTuc&MaTinTuc=" . $i->getMaTinTuc() . "'>Xóa</a>
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
                                             $n=round($tt->sumPage() / 4);
                                            echo '<li><a href="?admin=hienThiTinTuc&page=' .( $currentPage>=2?$currentPage-1:$currentPage) . '"> <</a></li>';
                                            for ($i = 1; $i <=$n;$i++){
                                                $str = '<li><a href="?admin=hienThiTinTuc&page=' . $i . '">' . $i . '</a></li>';
                                                if($i>5&& $i<$n){
                                                    $str = '<li>...</li>';
                                                    $str = '<li><a href="?admin=hienThiTinTuc&page=' . $n . '">' . $n . '</a></li>';
                                                    echo $str;
                                                    break;
                                                }
                                                echo $str;
                                            }
                                            echo '<li><a href="?admin=hienThiTinTuc&page=' . ($currentPage>= $n?$currentPage:$currentPage+1). '">></a></li>'; 
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
<style>
    .text-center img{
        width:50px;
        height:50px;
    }
</style>