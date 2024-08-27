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
<body>
<form action="" autocomplete="off" method="POST">
    <table border="0" width="50%" class="table-login" style="text-align:center; border-collapse:collapse;">
        <tr>
            <td colspan="2"><h3>Đăng Nhập Khách Hàng</h3></td>
        </tr>
        <tr>
            <td>Tài Khoản</td>
            <td><input type="text" size="50%" name="email" placeholder="Email..." required></td>
        </tr>
        <tr>
            <td>Mật Khẩu</td>
            <td><input type="password" size="50%" name="password" placeholder="Mật Khẩu..." required></td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="captcha-area">
                    <div class="captcha-img">
                    <div style="position: relative; display: inline-block; width: 410px; height: 200px;">
    <img style="width: 100%; height: 100%;" src="https://microsofters.com/wp-content/uploads/2021/06/img21-scaled.jpg" alt="Captcha Background">
    <span class="captcha" id="captcha" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size:50px; font-weight: bold;"></span>
    </div>
                    </div>
                    <button style="width: 100px; height:40px" type="button" class="reload-btn" onclick="generateCaptcha();"><i class="fa-solid fa-arrows-rotate"></i>change captcha</button>
                </div>
                <input type="text" name="captcha_input" id="captcha_input" placeholder="Enter Captcha" required class="form-control">
                <input type="hidden" name="captcha_generated" id="captcha_generated">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập"></td>
        </tr>
    </table>
</form>

<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
        }
        h3 {
            color: black;
            text-align: center;
            margin-bottom: 30px;
            font-size: 18px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #606770;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #dddfe2;
            border-radius: 6px;
            font-size: 16px;
        }
        .captcha-area {
            margin-bottom: 20px;
        }
        .captcha-img {
            position: relative;
            width: 100%;
            height: 100%;
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
            background-color: #42b72a;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .reload-btn:hover {
            background-color: #36a420;
        }
        .submit-btn {
            background-color: #1877f2;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background-color: #166fe5;
        }
    </style>

<script>
// Generate a simple CAPTCHA (for example, a random number)
function generateCaptcha() {
    const captcha = Math.random().toString(36).substr(2, 6); // Generates a random string with 6 characters
    document.getElementById('captcha').innerText = captcha; // Display CAPTCHA in the span
    document.getElementById('captcha_generated').value = captcha; // Store the generated captcha in a hidden field
}

// Call the function to generate CAPTCHA on page load
generateCaptcha();
</script>
 
</body>


