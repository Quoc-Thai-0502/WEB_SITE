<?php
    include('admincp/config/config.php');

    // session_start(); // Đảm bảo phiên làm việc được khởi động

    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $captchaInput = $_POST['captcha_input']; // Giá trị captcha người dùng nhập
        $captchaGenerated = $_POST['captcha_generated']; // Giá trị captcha đã sinh ra và hiển thị

        if($captchaInput !== $captchaGenerated) {
            echo '<script type="text/javascript">alert("Invalid captcha value");</script>';
        } else {
            if ($stmt = $mysqli->prepare("SELECT id_dangky, tenkhachhang FROM tbl_dangky WHERE email=? AND matkhau=?")) {
                $stmt->bind_param("ss", $email, $matkhau); 
                $stmt->execute();
                $stmt->store_result();

                if($stmt->num_rows > 0) {
                    $stmt->bind_result($id_dangky, $tenkhachhang);
                    $stmt->fetch();
                    $_SESSION['dangky'] = $tenkhachhang;
                    $_SESSION['id_khachhang'] = $id_dangky;
                    echo '<script type="text/javascript">alert("Đăng nhập thành công");</script>';
                } else {
                    echo '<script type="text/javascript">alert("Email hoặc mật khẩu không đúng");</script>';
                }

                $stmt->close();
            } else {
                echo '<script type="text/javascript">alert("Lỗi kết nối cơ sở dữ liệu");</script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       
       * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 400px;
            max-width: 90%;
            transform: translateY(20px);
            height: 500px;
            opacity: 0;
            animation: fadeIn 0.5s ease-out forwards;
            margin-left: 205px;
        }
        @keyframes fadeIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        h3 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 500;
        }
        .input-group {
            margin-bottom: 25px;
            position: relative;
        }
        .input-group input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #333;
            border: none;
            border-bottom: 1px solid #777;
            outline: none;
            background: transparent;
            transition: 0.3s;
        }
        .input-group label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #777;
            pointer-events: none;
            transition: 0.3s ease-out;
        }
        .input-group input:focus ~ label,
        .input-group input:valid ~ label {
            top: -20px;
            font-size: 12px;
            color: #5264AE;
        }
        .input-group input:focus ~ .bar:before {
            width: 100%;
        }
        .bar {
            position: relative;
            display: block;
            width: 100%;
        }
        .bar:before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background: #5264AE;
            transition: 0.3s ease-out;
        }
        .captcha-area {
            margin-bottom: 25px;
        }
        .captcha-img {
            position: relative;
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            overflow: hidden;
            border-radius: 6px;
        }
        .captcha-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .captcha {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 30px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .reload-btn {
            background-color: #FFD700;
            color: black;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .reload-btn:hover {
            background-color: #EEC900;
            transform: translateY(-2px);
        }
        .submit-btn {
            background: linear-gradient(45deg, #f9e610, #e1cc02);
            color: black;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
        }
        .submit-btn:hover {
            background-color: #3f51b5;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h3>Đăng Nhập Khách Hàng</h3>
        <form action="" method="POST" autocomplete="off">
            <div class="input-group">
                <input type="text" name="email" required>
                <span class="bar"></span>
                <label>Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <span class="bar"></span>
                <label>Mật Khẩu</label>
            </div>
            <div class="captcha-area">
                <div class="captcha-img">
                    <img src="https://microsofters.com/wp-content/uploads/2021/06/img21-scaled.jpg" alt="Captcha Background">
                    <span class="captcha" id="captcha"></span>
                </div>
                <button type="button" class="reload-btn" onclick="generateCaptcha();">
                    <i class="fas fa-sync-alt"></i> Đổi Captcha
                </button>
            </div>
            <div class="input-group">
                <input type="text" name="captcha_input" id="captcha_input" required>
                <span class="bar"></span>
                <label>Nhập Captcha</label>
            </div>
            <input type="hidden" name="captcha_generated" id="captcha_generated">
            <button type="submit" name="dangnhap" class="submit-btn">Đăng Nhập</button>
        </form>
    </div>

    <script>
        function generateCaptcha() {
            const captcha = Math.random().toString(36).substr(2, 6);
            document.getElementById('captcha').innerText = captcha;
            document.getElementById('captcha_generated').value = captcha;
        }
        generateCaptcha();
    </script>
</body>
</html>