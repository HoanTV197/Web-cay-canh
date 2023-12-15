<?php
 include '../../controller/HoaDonNhapController.php';
 
 //include '../../controller/NhaCungCapController.php';
if(isset( $_GET['MaHDN'])){
    $MaHDN = $_GET['MaHDN'];
    echo $MaHDN;
    $hdn = new HoaDonNhapController();
    // Lấy ra chi tiết hóa đơn
    $ct=$hdn->getChiTietDHN($MaHDN);
    //lấy sản phẩm trong chi tiết hóa đơn
    $sp = $hdn->getListSP($MaHDN);
    
    //Lấy hóa đơn nhập
    $hoadon = $hdn->getHDN($MaHDN);
    //Lấy nhà cung cấp
    $ncc=$hdn->getNCC($hoadon->getMaNCC());
}
?>
<div class="content-wrapper" style="min-height: 564px;">
            <section class="content-header">
                <h1> Chi tiết đơn hàng</h1>
                <div class="breadcrumb">
                <a class="btn btn-primary btn-sm" href="?admin=suaCTHDN&page=1" role="button">
				 Sửa
			</a>
                    <a class="btn btn-primary btn-sm" href="?admin=hienThiHoaDonNhap&page=1" role="button">
				 Thoát
			</a>
                </div>
            </section>
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <!--ND-->
                                <div id="view">
                                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <h1 class="text-center" style="color: red;">CHI TIẾT ĐƠN HÀNG</h1>
                                        <h4>Tên nhà cung cấp: <b><?php echo $ncc->getTenNCC() ?></b></h4>
                                        <h4>Điện thoại: <i><?php echo $ncc->getPhone() ?></i></h4>
                                        <h4>Thời gian đặt hàng: <i><?php echo $hoadon->getNgayTao() ?></i></h4>
                                        <h4>Địa chỉ: <?php echo $ncc->getDiaChi() ?> </h4>
                                        <h4>Mã đơn hàng: <b><?php echo $MaHDN?></b></h4>
                                        <br />
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">STT</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th class="text-center" style="width:100px">Số lượng</th>
                                                        <th style="width:120px">Giá bán</th>
                                                        <th class="text-right" style="width:120px">Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php
                                                     include_once '../../model/ChiTietHDN.php';
                                                     $sum = 0;
                                                     for ($i = 0; $i < count($ct);$i++){
                                                        for($j=0;$j<count($sp);$j++){
                                                            if($ct[$i]->getMaSP()==$sp[$j]->getMaSP()){
                                                                $str = ' <tr>
                                                                <td class="text-center">'.($i+1).'</td>
                                                                <td>'.$sp[$j]->getTenSP().'</td>
                                                                <td class="text-center">'.$ct[$i]->getSoLuong().'</td>
                                                                <td>'.$sp[$j]->getDonGiaNhap().'₫</td>
                                                                <td class="text-right">'.($ct[$i]->getSoLuong()*$sp[$j]->getDonGiaNhap()).',000₫</td>
                                                            </tr>';
                                                            $sum += ($ct[$i]->getSoLuong()*$sp[$j]->getDonGiaNhap());
                                                            echo $str;
                                                            }
                                                        }
                                                     }
                                                        
                                                    ?> 
                                                   
                                                    <tr>
                                                        <td colspan="6" class="text-right" style="border: none; font-size: 1.1em;">Tổng cộng: 
                                                        <?php echo $sum;?>
                                                        ,000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="text-right" style="border: none; font-size: 0.9em;"><i>Phí vận chuyển: </i> 30,000₫
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="text-right" style="border: none; color: red; font-size: 1.3em;">Thành tiền: <?php echo $sum+30;?>
                                                        ,000₫</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-right" colspan="6">
                                                            <a class="btn btn-primary btn-md" role="button" onclick="window.print()">
														<span class="glyphicon glyphicon-print"></span> In đơn hàng
													</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <ul class="pagination">
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--/.ND-->
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>