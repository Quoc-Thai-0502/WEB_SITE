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
<p1>Đăng Kí Thành Viên</p1>
<style type="text/css">
    table.dangky tr td{
        padding: 5px;
    }
</style>
<form action="" method="POST">
<table class="dangky" border="1" width="50%" style="border-collapse:collapse;">
    <tr>
        <td>Họ Và Tên</td>
        <td><input type="text" size="50"  name="hovaten"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" size="50" name="email"></td>
    </tr>
    <tr>
        <td>Điện Thoại</td>
        <td><input type="text" size="50"  name="dienthoai"></td>
    </tr>
    <tr>
        <td>Địa Chỉ</td>
        <td><input type="text" size="50"  name="diachi"></td>
    </tr>
    <tr>
        <td>Mật Khẩu</td>
        <td><input type="text" size="50"  name="matkhau"></td>
    </tr>
    <tr>

        <td><input type="submit"   name="dangky" value="Đăng Ký"></td>
        <td><a href="index.php?quanly=dangnhap">Đăng Nhập Nếu Có Tài Khoản</a></td>
    </tr>

</table>
</form>
<style>
p1 {
    text-align: center;
    color: #2c3e50;
    font-size: 32px;
    font-weight: bold;
    margin-left: 235px;
    margin-bottom: 60px;
    margin-top: 100px;
    
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
}
p1::after {
    content: '';
    display: block;
    width: 100px;
    height: 3px;
    background: #3498db;
    margin-left: 370px;
    margin-bottom: 30px;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    
}

.form-title {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.registration-form {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    
}

.dangky {
    width: 72%;
    border-collapse: separate;
    border-spacing: 0 15px;
    
}

.dangky tr td {
    padding: 10px;
    font-size: 16px;
    color: #333;
}

.dangky tr td:first-child {
    font-weight: bold;
    text-align: center;
    width: 30%;
}

.dangky input[type="text"],
.dangky input[type="email"],
.dangky input[type="password"] {
    width: 95%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
}

.dangky input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.dangky input[type="submit"]:hover {
    background-color: #0056b3;
}

.dangky a {
    color: #007bff;
    text-decoration: none;
    font-size: 16px;
    text-align: center;
    display: block;
    border-radius: 10px;
    margin-top: 10px;
}



.form-actions {
    text-align: right;
    border-top: 1px solid #ccc;
    padding-top: 15px;
    
}

@media (max-width: 768px) {
    .dangky tr td:first-child {
        text-align: center;
        width: 100%;
        display: block;
        margin-bottom: 10px;
        border-radius: 10px;
    }

    .dangky tr td:last-child {
        width: 100%;
        
    }
}

</style>