<html lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hệ thống quản lý cơ sở dữ liệu</title>
    <link rel="shortcut icon" href="./assets/public/images/templates/favicon.png" />
    <!-- <link rel="stylesheet" href="./assets/public/css/bootstrap.css"> -->
    <link rel="stylesheet" href="./assets/public/css/login.css">
    <link rel="stylesheet" href="./assets/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .pull-right {
            display: flex;
            justify-content: start;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .pull-right li {
            list-style: none;
            padding: 5px;

        }

        .form-row {
            margin: 10px;
        }

        .notifi {
            padding-left: 11px;
            color: red;
        }
    </style>
</head>

<body>
    <div class="container khung">
    <div class="title">
        <h2 class="text-center" style="color:#337ab7">Web Cây Cảnh</h2>
    </div>
    <hr>
    <div class="myform">
        <form name="form2" action="regiter.php" method="post">
            <?php
            include './database/DB.php';
            include './controller/RegisterController.php';
            $db = new DB();
            $registerController=new RegisterController();
            session_start();
            $sql = "SELECT COUNT(*) AS total FROM khachhang";
            $result1 = $db->executeSQL($sql);
            $row = $result1->fetch_assoc();
            $totalCustomers = $row['total'];
            if (isset($_POST['register'])) {
                // Lấy giá trị từ form
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $tenKH = $_POST['name'];
                $phone = $_POST['phone'];
                $diaChi = $_POST['diachi'];
                $gioiTinh = $_POST['gender'];
                $ngaySinh = $_POST['birthday'];
                // Kiểm tra username đã tồn tại trong SQL chưa
                $usernameExists = $registerController->checkUsernameExists($username);
                $emailExists = $registerController->checkEmailExists($email);
                if ($usernameExists) {
                    // Username đã tồn tại
                    echo "Username đã tồn tại. Vui lòng chọn username khác.";
                } 
                else {
                    if($emailExists){
                        echo "Email đã tồn tại. Vui lòng chọn email khác";
                    }
                    else {
                        // Thực hiện lưu thông tin đăng ký vào SQL
                        $db = new DB();
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu
                    
                        $sql = "INSERT INTO `User` (username, password, LoaiUser) VALUES ('$username', '$hashedPassword', 0);";
                        $result = $db->executeSQL($sql);
                    
                        if ($result) {
                            // Thêm thông tin đăng ký vào bảng khachhang
                            $maKH = "KH" . str_pad($totalCustomers + 1, 3, '0', STR_PAD_LEFT);
                            $sql = "INSERT INTO `khachhang` (MaKH, TenKH, email, Phone, GioiTinh, NgaySinh, DiaChi, AnhDaiDien, GhiChu, username) VALUES ('$maKH', '$tenKH', '$email', '$phone', '$gioiTinh', '$ngaySinh', '$diaChi', '$anhDaiDien', '$ghiChu', '$username');";
                            $result = $db->executeSQL($sql);
                    
                            if ($result) {
                                // Chuyển hướng người dùng đến trang khác sau khi đăng ký thành công
                                header("Location: ./view/pages/index.php");
                            } else {
                                echo "Đã xảy ra lỗi khi lưu thông tin đăng ký vào SQL.";
                            }
                        } else {
                            echo "Đã xảy ra lỗi khi lưu thông tin đăng ký vào SQL.";
                        }
                    }
                }
            }
            ?>
            <!-- user -->
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                </div>
            </div>
            <!-- end user -->

            <!-- password -->
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                </div>
            </div>
            <!-- end password -->

            
            <!-- name -->
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" name="name" class="form-control" placeholder="Tên Khách Hàng">
                </div>
            </div>
            <!-- end name -->

            
            <!-- phone -->
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="number" name="phone" class="form-control" placeholder="Số điện thoại">
                </div>
            </div>
            <!-- end phone -->

            <!-- địa chỉ -->
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" name="diachi" class="form-control" placeholder="Địa chỉ">
                </div>
            </div>
            <!-- end địa chỉ -->

            <!-- email -->
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    
                </div>
            </div>
            <!-- end email -->

            
            <!-- giới tính -->
            <div class="row form-row">
                <div class="input-group">
                    <label for="gender">Giới tính:</label>
                    <select name="gender" id="gender">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    <label for="birthday">Ngày sinh:</label>
                    <input type="date" id="birthday" name="birthday">
                </div>
            </div>
            <!-- end giới tính -->
            <div class="row form-row" style="width:92%; margin-top: 10px;">
                <button type="submit" name="register" class="form-control btn btn-primary btn-login">Đăng ký</button>
            </div>
            <ul class="pull-right ">
                <li><a href="./forgotPass.php" class="fright">Quên mật khẩu?</a></li>
                <li><a href="./login.php" class="fright">Đăng nhập</a></li>
            </ul>
        </form>
    </div>
    <hr>
</div>
    <!-- jQuery -->
    <script src="./assets/public/js/jquery-2.2.3.min.js"></script>
    <script src="./assets/public/js/bootstrap.js"></script>

</body>

</html>