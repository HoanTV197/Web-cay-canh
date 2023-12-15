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
    <?php
     session_start();
    include './database/DB.php';
    include './controller/LoginController.php';
    $db = new DB();
    $login=new LoginController();
   
    //logout
    if (isset($_SESSION['username'])&& isset($_SESSION['password'])&& isset($_SESSION['loaiUser'])) {

        // Xóa biến session
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['loaiUser']);
        // Hiển thị thông báo xác nhận đăng xuất
        echo "<script>alert('Bạn đã đăng xuất thành công');</script>";
    }
   
    //Login
    if (isset($_POST["username"])) {
        // Lấy dữ liệu đăng nhập
        $username = $_POST["username"];
        $password = $_POST["password"];
        $kq=$login->login($username, $password);
        if ($kq !=false) {
            echo "<script>alert('đăng nhập thành công');".$_SESSION["username"]."'</script>";
            $_SESSION["username"] = $kq['username'];
            $_SESSION["password"] = $kq['password'];
            $_SESSION["LoaiUser"] = $kq['LoaiUser'];
           if($_SESSION["LoaiUser"]==0){
            echo "<script>alert('đăng nhập thành công".$_SESSION["username"]."');window.location='./view/pages/index.php'</script>";
                
           }
           else{
            echo "<script>alert('đăng nhập thành công".$_SESSION["username"]."');window.location='./view/admin/admin.php'</script>";

           }
        }
    }  
    
    ?>
    <div class="container khung">
        <div class="title">
            <h2 class="text-center" style="color:#337ab7">Web Cây Cảnh</h2>
        </div>
        <hr>
        <div class="myform">
            <form name="form1" action="index.php" method="post">
                <?php
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    if($kq==false)
                        echo "Tài khoản chưa chính xác" ;
                }
                ?>
                <div class="row form-row">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">

                    </div>
                   
                </div>
                <?php
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $pattern_username = "/^[a-zA-Z0-9_]{3,20}$/";

                    if (preg_match($pattern_username, $username)) {
                        echo "<p class='notifi'>Tên đăng nhập hợp lệ.</p>";
                    } else {
                        echo "<p class='notifi'>Tên đăng nhập không hợp lệ.</p>";
                    }
                }


                ?>
                <div class="row form-row">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">

                    </div>
                    <!-- check password -->
                    <?php
                    if (isset($_POST['username']) && isset($_POST['password'])) {
                        $pattern_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/";
                        // Thay đổi thành mật khẩu bạn muốn kiểm tra

                        if (preg_match($pattern_password, $password)) {
                            echo "<p class='notifi'>Mật khẩu hợp lệ.</p>";
                        } else {
                            echo "<p class='notifi'>Mật khẩu không hợp lệ.</p>";
                        }
                    }


                    ?>

                    <div class="row form-row" style="width:92%; margin-top: 10px;">
                        <button type="submit" class="form-control btn btn-primary btn-login">Đăng nhập</button>

                    </div>
                    <ul class="pull-right ">
                        <li><a href="./login/forgotPass.php " class="fright ">Quên mật khẩu?</a></li>
                        <li><a href="view/login/regiter.php" class="fright "> Đăng ký </a></li>
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