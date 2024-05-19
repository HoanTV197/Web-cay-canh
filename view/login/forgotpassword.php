<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quên mật khẩu</title>
    <link rel="shortcut icon" href="./assets/public/images/templates/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .title h2 {
            font-size: 24px;
            color: #337ab7;
            margin-bottom: 20px;
        }

        .myform {
            margin-top: 20px;
        }

        .input-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .input-group-addon {
            padding: 10px 15px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 4px 0 0 4px;
            color: #555;
        }

        .form-control {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 0 4px 4px 0;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #337ab7;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #286090;
        }

        .notifi {
            color: red;
            padding-left: 15px;
            margin-bottom: 10px;
        }

        .pull-right {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .pull-right li {
            list-style: none;
            padding: 5px;
        }

        .pull-right li a {
            text-decoration: none;
            color: #337ab7;
            transition: color 0.3s;
        }

        .pull-right li a:hover {
            color: #23527c;
        }
    </style>
</head>
<body>
    <div class="container khung">
        <div class="title">
            <h2 class="text-center" style="color:#337ab7">Quên mật khẩu</h2>
        </div>
        <hr>
        <div class="myform">
            <form name="forgot_password" action="forgotpassword.php" method="post">
                <?php
                include '../../database/DB.php';
                include '../../controller/ForgotPasswordController.php';

                $forgotPasswordController = new ForgotPasswordController();
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    $result = $forgotPasswordController->sendResetLink($email);
                    if ($result) {
                        echo "<p class='notifi'>Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.</p>";
                    } else {
                        echo "<p class='notifi'>Email không tồn tại trong hệ thống.</p>";
                    }
                }
                ?>
                <div class="row form-row">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>
                <div class="row form-row" style="width: 92%; margin-top: 10px;">
                    <button type="submit" class="form-control btn btn-primary">Gửi yêu cầu</button>
                </div>
                <ul class="pull-right">
                    <li><a href="./login.php" class="fright">Đăng nhập</a></li>
                    <li><a href="./register.php" class="fright">Đăng ký</a></li>
                </ul>
            </form>
        </div>
        <hr>
    </div>
    <script src="./assets/public/js/jquery-2.2.3.min.js"></script>
    <script src="./assets/public/js/bootstrap.js"></script>
</body>
</html>
