<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
       
       * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin-left: -170px;
            
        }

        .cart-title {
            text-align: center;
            color: #2c3e50;
            font-size: 30px;
            font-weight: bold;
            margin: 40px 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        .cart-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: #3498db;
            margin: 10px auto 0;
            transition: width 0.3s ease;
        }

        .cart-title:hover::after {
            width: 150px;
        }

        .welcome-message {
            background-color: #fff;
            border-left: 4px solid #3498db;
            color: #2c3e50;
            font-size: 16px;
            padding: 15px;
            margin-bottom: 5px;
            border-radius: 4px;
            margin-left: 220px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            animation: slideIn 0.5s ease-out;
        }

        .welcome-message .user-name {
            color: #3498db;
            font-weight: bold;
            text-transform: capitalize;
        }

        .cart-table {
            width: 87%;
            border-collapse: separate;
            border-spacing: 0 15px;
            margin-left: 220px;
        }

        .cart-table th {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 15px;
            text-align: left;
        }

        .cart-table td {
            background-color: #fff;
            padding: 15px;
            vertical-align: middle;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .cart-table tr:hover td {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .cart-table img {
            max-width: 80px;
            border-radius: 4px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-control i {
            color: #3498db;
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .quantity-control i:hover {
            color: #2980b9;
        }

        .action-links a {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .action-links a:hover {
            color: #c0392b;
        }

        .cart-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-left: 200px;
            padding: 20px;
            width: 90%;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .total-price {
            font-size: 18px;
            font-weight: bold;
        }

        .cart-actions {
            display: flex;
            gap: 10px;
            
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn:active {
            transform: scale(0.98);
        }

        .btn-danger {
            background-color: #e74c3c;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-primary {
            background-color: #3498db;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .empty-cart {
            text-align: center;
            padding: 50px 0;
            color: #7f8c8d;
            font-style: italic;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @media (max-width: 768px) {
            .cart-table, .cart-table tbody, .cart-table tr, .cart-table td {
                display: block;
            }

            .cart-table thead {
                display: none;
            }

            .cart-table tr {
                margin-bottom: 20px;
            }

            .cart-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .cart-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                font-weight: bold;
            }

            .cart-summary {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="cart-title">Giỏ Hàng</h1>
        
        <?php if(isset($_SESSION['dangky'])): ?>
        <div class="welcome-message">
            Xin chào, <span class="user-name"><?php echo htmlspecialchars($_SESSION['dangky']); ?></span>!
        </div>
        <?php endif; ?>

        <?php if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tongtien = 0;
                    foreach($_SESSION["cart"] as $cart_item):
                        $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                        $tongtien += $thanhtien;
                    ?>
                    <tr>
                        <td data-label="Sản Phẩm">
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" alt="<?php echo $cart_item['tensanpham']; ?>">
                            <?php echo $cart_item['tensanpham']; ?>
                        </td>
                        <td data-label="Giá"><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'đ'; ?></td>
                        <td data-label="Số Lượng">
                            <div class="quantity-control">
                                <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fas fa-minus"></i></a>
                                <span><?php echo $cart_item['soluong']; ?></span>
                                <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fas fa-plus"></i></a>
                            </div>
                        </td>
                        <td data-label="Tổng"><?php echo number_format($thanhtien, 0, ',', '.') . 'đ'; ?></td>
                        <td data-label="Thao Tác" class="action-links">
                            <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <div class="total-price">
                    Tổng Tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'đ'; ?>
                </div>
                <div class="cart-actions">
                    <a href="pages/main/themgiohang.php?xoatatca=1" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Xóa Tất Cả
                    </a>
                    <?php if(isset($_SESSION['dangky'])): ?>
                        <a href="pages/main/thanhtoan.php" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Đặt Hàng
                        </a>
                    <?php else: ?>
                        <a href="index.php?quanly=dangky" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Đăng Ký Đặt Hàng
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>
            <p class="empty-cart">Hiện Tại Giỏ Hàng Trống</p>
        <?php endif; ?>
    </div>
</body>
</html>