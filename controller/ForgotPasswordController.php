<?php
include_once '../../database/DB.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

class ForgotPasswordController {
    public function sendResetLink($email) {
        $db = new DB();
        $sql = "SELECT * FROM `khachhang` WHERE email='$email';";
        $result = $db->executeSQL($sql);

        if ($result && $result->num_rows > 0) {
            $token = bin2hex(random_bytes(50)); // Tạo token ngẫu nhiên
            $expires = date('U') + 1800; // Hết hạn sau 30 phút

            $user = $result->fetch_assoc();
            $username = $user['username'];

            // Lưu token vào bảng password_reset
            $sql = "INSERT INTO `password_reset` (email, token, expires) VALUES ('$email', '$token', '$expires');";
            $db->executeSQL($sql);

            // Tạo link đặt lại mật khẩu
            $resetLink = "http://yourdomain.com/resetpassword.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Hi $username,\n\nPlease click the following link to reset your password: $resetLink\n\nIf you did not request a password reset, please ignore this email.";

            // Sử dụng PHPMailer để gửi email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com'; // Thay bằng SMTP server của bạn
                $mail->SMTPAuth = true;
                $mail->Username = 'your_email@example.com'; // Thay bằng email của bạn
                $mail->Password = 'your_password'; // Thay bằng mật khẩu email của bạn
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('no-reply@yourdomain.com', 'Your Website');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(false);
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                return true;
            } catch (Exception $e) {
                error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
