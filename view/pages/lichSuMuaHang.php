<div class="content-wrapper">
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
                                                <th class="text-center">Mã hóa đơn bán </th>
                                                <th class="text-center">Ngày tạo</th>
                                                <th class="text-center">Tổng tiền </th>
                                                <th class="text-center">Mã số thuế</th>
                                                <th class="text-center">Ghi chú</th>
                                                <th class="text-center">Phương thức thanh toán</th>
                                                <th class="text-center">Giảm giá </th>
                                                <th class="text-center">Trạng thái</th>
                                                <th class="text-center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../controller/HoaDonBanController.php';
                                           
                                           // lấy số trang hiện tại
                                            $currentPage=$_GET['page'];
                                            //gọi đến controller
                                            $HDB = new HoaDonBanController();
                                            $username = $_SESSION['username'];
                                            $listHDB=$HDB->listHD_KH($username);
                                           
                                             /*Hiển thị danh sách hóa đơn bán*/
                                             foreach ($listHDB as $i) {
                                                if($i->getTrangThai()=='0'){
                                                    $trangThai = 'Chờ xử lý';
                                                }
                                                if($i->getTrangThai()=='1'){
                                                    $trangThai = 'Hủy';
                                                }
                                                if($i->getTrangThai()=='2'){
                                                    $trangThai = 'Hoàn thành';
                                                }
                                                if(isset($_GET['huy'])){
                                                    $huy=$HDB->updateHDB($_GET['mahoadon'], $_GET['huy']);
                                                    if($huy){
                                                        echo "<script>alert('Bạn đã hủy đơn hàng Thành công');</script>";
                                                        break;
                                                   }
                                                   else{
                                                    echo "<script>alert('Hủy Thất bại');</script>";
                                                        break;
                                                   }
                                                }
                                                echo $str = '<tr>'
                                                    . '<td class="text-center">' . $i->getMaHDB() . '</td>'
                                                    . '<td class="text-center">' . $i->getNgayTao() . '</td>' 
                                                    . '<td class="text-center">' . $i->getTongTienHD() . '</td>' 
                                                    . '<td class="text-center">' . $i->getMaSoThue() . '</td>'
                                                    . '<td class="text-center">' . $i->getGhiChu() . '</td>'
                                                    . '<td class="text-center">' . $i->getPTThanhToan() . '</td>'
                                                    . '<td class="text-center">' . $i->getGiamGiaHD() . '</td>'
                                                    . '<td class="text-center">' .  $trangThai . '</td>' 
                                                          
                                                    . "<td><a class='btn btn-success btn-xs' href='?pages=chiTietHDB&MaHDB=" . $i->getMaHDB() . "'>Xem</a>".
                                                   ($i->getTrangThai()!='0'?"":"
                                                   
                                                   <a class='btn btn-danger btn-xs' href='?pages=lichSuMuaHang&page=1&huy=1&mahoadon=".$i->getMaHDB()."'>Hủy</a>
                                                   </td>") ."
                                                </tr>";
                                                
                                                
                                               
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
                                             $n = round($HDB->sumPage()/10);
                                            echo '<li><a href="?pages=lichSuMuaHang&page=' .( $currentPage>=2?$currentPage-1:$currentPage) . '"> <</a></li>';
                                            for ($i = 1; $i <= ($n) ;$i++){
                                                $str = '<li><a href="?pages=lichSuMuaHang&page=' . $i . '">' . $i . '</a></li>';
                                                if($i>5&& $i<$n){
                                                    $str = '<li>...</li>';
                                                    $str = '<li><a href="?pages=lichSuMuaHang&page=' . $n . '">' . $n . '</a></li>';
                                                    echo $str;
                                                    break;
                                                }
                                                echo $str;
                                            }
                                            echo '<li><a href="?pages=lichSuMuaHang&page=' . ($currentPage>= $n?$currentPage:$currentPage+1). '">></a></li>'; 
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