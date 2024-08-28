<?php
session_start();
include("../../admincp/config/config.php");

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['id_khachhang'])) {
    header('Location: ../../index.php?quanly=dangnhap');
    exit();
}

$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);

// Sử dụng prepared statement để tránh SQL injection
$insert_cart = $mysqli->prepare("INSERT INTO tbl_cart (id_khachhang, code_cart, cart_status) VALUES (?, ?, 1)");
$insert_cart->bind_param("ii", $id_khachhang, $code_order);

if ($insert_cart->execute()) {
    // Thêm chi tiết giỏ hàng
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $insert_details = $mysqli->prepare("INSERT INTO tbl_cart_details (id_sanpham, code_cart, soluongmua) VALUES (?, ?, ?)");
        
        foreach ($_SESSION['cart'] as $item) {
            $id_sanpham = $item['id'];
            $soluong = $item['soluong'];
            
            $insert_details->bind_param("iii", $id_sanpham, $code_order, $soluong);
            $insert_details->execute();
            
            if ($insert_details->error) {
                // Xử lý lỗi nếu có
                error_log("Lỗi khi thêm chi tiết giỏ hàng: " . $insert_details->error);
            }
        }
        
        $insert_details->close();
        
        // Xóa giỏ hàng sau khi đã xử lý thành công
        unset($_SESSION["cart"]);
        
        // Chuyển hướng đến trang cảm ơn
        header('Location: ../../index.php?quanly=camon');
        exit();
    } else {
        // Trường hợp giỏ hàng trống
        header('Location: ../../index.php?quanly=giohang&error=empty');
        exit();
    }
} else {
    // Xử lý lỗi khi không thể tạo đơn hàng
    error_log("Lỗi khi tạo đơn hàng: " . $insert_cart->error);
    header('Location: ../../index.php?quanly=giohang&error=order_failed');
    exit();
}

$insert_cart->close();
$mysqli->close();
?>