<!--CONTENT-->
<script>
    this.genderHTMLCart();
</script>

<?php

include_once '../../database/DB.php';
include_once '../../model/SanPham.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['username'])) {
        echo "<script type='text/javascript'>alert('Vui lòng đăng nhập. Chúng tôi sẽ chuyển hướng về trang đăng nhập trong giây lát ...!');</script>";
        echo "<script>setTimeout(function(){window.location.href = '../../index.php';}, 100);</script>";
        return;
    }

    $db = new DB();
    $dataProduct = $_POST['cart'] ?? [];
    if (empty($dataProduct)) {
        //chuyển về trang chủ nếu không có sản phẩm trong giỏ hàng
        echo "<script>setTimeout(function(){window.location.href = '?pages=trangchu';}, 1000);</script>";
        echo "<script> alert('Giỏ hàng trống. Chúng tôi sẽ chuyển hướng về trang chủ trong giây lát ...!');</script>";
        return;
    }

    $totalCart = $_POST['total-cart'] ?? 0;
    $total = 0;
    $productCount = 0; // Initialize product count

    foreach ($dataProduct as $key => $value) {
        $sql = "SELECT * FROM sanpham WHERE MaSP = '" . $value['code'] . "'";
        $result = $db->executeSQL($sql);

        if (!($result->num_rows > 0)) {
            $mess = "Không tìm thấy sản phẩm mã " . $value['code'];
            echo "<script type='text/javascript'>alert('$mess')</script>";
            return;
        }

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $total += $value['quantity'] * $product['DonGiaBan'];
            $productCount += $value['quantity']; // Add the quantity of the current product to the count
            $_SESSION['tongtien'] = $total;
        }
    }

    // Save product count to session
    $_SESSION['cart_count'] = $productCount;

    if ($total != $totalCart) {
        $messError = "Giá sản phẩm không đúng";
        echo "<script type='text/javascript'>alert('$messError')</script>";
        return;
    }
    $order_products = json_encode($dataProduct);
    $maSP = json_decode($order_products);

    include_once '../../controller/HoaDonBanController.php';
    $hd = new HoaDonBanController();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $NgayTao = date('Y-m-d H:i:s');
    $username = $_SESSION['username'];
    $MaKH = $hd->getKhachHang($username);
    $MaHDB = $hd->autoMaHDB(); // Gọi phương thức tạo mã hóa đơn bán tự động
    $hd->insertHDB($MaHDB, $NgayTao, $total, 'MS10', 'Tiền mặt', '0', '0', '', $MaKH, 'NV001');
   
    foreach ($maSP as $i) {
        $MaSP = $i->code;
        $SoLuong = $i->quantity;
        $MaCTHDB = $hd->autoMaCTHDB(); // Gọi phương thức tạo mã chi tiết hóa đơn bán tự động
        $hd->insertCTHDB($MaHDB, $MaCTHDB, $MaSP, $SoLuong);
    }
    echo "<script type='text/javascript'>this.handleOrderSuccess()</script>";
}
?>

<div class="row content-cart ">
    <div class="container ">
        <form action="?pages=giohang " method="post" id="cartformpage">
            <div class="cart-index ">
                <h2>Chi tiết giỏ hàng</h2>
                <div class="tbody text-center ">
                    <div class="col-xs-12 col-12 col-sm-12 col-md-8 col-lg-8 ">
                        <table class="table table-list-product ">
                            <thead>
                                <tr style="background: #f3f3f3; ">
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th class="text-center ">Đơn giá</th>
                                    <th class="text-center ">Số lượng</th>
                                    <th class="text-center ">Thành tiền</th>
                                    <th class="text-center ">Xóa</th>
                                </tr>
                            </thead>
                            <tbody id="body-cart">
                            </tbody>
                        </table>
                        <button class="btn ">
                            <!-- <a href="./trangchu.php">Tiếp tục mua hàng</a></button> -->
                             <!-- Điều hướng về trang chủ  -->
                              <a href="?pages=trangchu">Tiếp tục mua hàng</a></button>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 ">
                        <div class="clearfix btn-submit " style="padding-left: 10px;margin-top: 20px; ">
                            <table class="table total-price " style="border: 1px solid #ececec; ">
                                <tbody>
                                    <tr style="background: #f4f4f4; ">
                                        <td>Tổng tiền</td>
                                        <td><strong id="total-cart"></strong><input hidden name="total-cart" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2 ">
                                            <h5>Mua hàng trực tiếp tại cửa hàng giảm giá 5%</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2 ">
                                            <h5>Nếu đặt online Bạn hãy đồng ý với điều khoản sử dụng & hướng dẫn hoàn trả.</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2 ">
                                            <button type="submit" class="btn-next-checkout ">Đặt hàng</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>