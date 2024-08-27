<?php

    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['matkhau']);
        $diachi = $_POST['diachi'];
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo '<p style="color:green">Bạn Đã Đăng Ký Thành Công</p>';
            $_SESSION['dangky']= $tenkhachhang;
            $_SESSION['id_khachhang']= mysqli_insert_id($mysqli);
         //   header('Location:index.php?quanly=giohang');
        }
        
    }

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Thành Viên</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

       
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin-left: 170px;
            animation: fadeIn 0.5s ease-out;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            position: relative;
        }

        h1::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: #764ba2;
            margin: 10px auto 0;
            transition: width 0.3s ease;
        }

        .container:hover h1::after {
            width: 100px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-bottom: 2px solid #ddd;
            background-color: transparent;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #764ba2;
        }

        .form-group label {
            position: absolute;
            top: 15px;
            left: 0;
            font-size: 16px;
            color: #999;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -20px;
            font-size: 12px;
            color: #764ba2;
        }

        button {
            background: linear-gradient(45deg, #f9e610, #e3cc02);
            color: black;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        button:hover {
            background-color: #d1cc02;
        }

        button:active {
            transform: scale(0.98);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #764ba2;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #667eea;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Đăng Ký Thành Viên</h1>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" id="hovaten" name="hovaten" required placeholder=" ">
                <label for="hovaten">Họ Và Tên</label>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" required placeholder=" ">
                <label for="email">Email</label>
            </div>
            <div class="form-group">
                <input type="tel" id="dienthoai" name="dienthoai" required placeholder=" ">
                <label for="dienthoai">Điện Thoại</label>
            </div>
            <div class="form-group">
                <input type="text" id="diachi" name="diachi" required placeholder=" ">
                <label for="diachi">Địa Chỉ</label>
            </div>
            <div class="form-group">
                <input type="password" id="matkhau" name="matkhau" required placeholder=" ">
                <label for="matkhau">Mật Khẩu</label>
            </div>
            <button type="submit" name="dangky">Đăng Ký</button>
        </form>
        <div class="login-link">
            <a href="index.php?quanly=dangnhap">Đăng Nhập Nếu Có Tài Khoản</a>
        </div>
    </div>
</body>
</html>