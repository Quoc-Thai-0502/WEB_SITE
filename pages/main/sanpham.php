<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
       
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        .product-title {
            margin-left: 270px;
            margin-bottom: 30px;
            margin-top: -20px;
            color: #2c3e50;
            font-size: 2em;
            animation: fadeInDown 0.5s ease-out;
        }
        .wrapper_chitiet {
            display: flex;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
        }
        .hinhanh_sanpham {
            
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .hinhanh_sanpham img {
            max-width: 1200px;
            width: 300px;
            height: 450px;
            margin-top: -200px;
            border-radius: 10px; 
            transition: transform 0.3s ease;
            animation: zoomIn 0.5s ease-out;
        }
        .hinhanh_sanpham img:hover {
            transform: scale(1.05);
        }
        .chitiet_sanpham {
            flex: 1;
            padding: 40px;
            display: flex;
            margin-top: -46px;
            margin-left: 20px;
            flex-direction: column;
            justify-content: center;
        }
        .chitiet_sanpham h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.8em;
            animation: slideInRight 0.5s ease-out;
        }
        .chitiet_sanpham p {
            margin-bottom: 15px;
            font-size: 1.1em;
            animation: slideInRight 0.5s ease-out;
        }
        .themgiohang {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 12px 25px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out 0.5s;
            align-self: flex-start;
        }
        .themgiohang:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .product-meta {
            display: flex;
            margin-top: 30px;
            padding-top: 20px;
            padding: 10px auto;
            justify-content: 100px;
            border-top: 1px solid #eee;
            margin-left: -30px;
            animation: slideInUp 0.5s ease-out;
        }
        .meta-item {
            text-align: center;
        }
        .meta-item i {
            font-size: 1.5em;
            color: #3498db;
            margin-bottom: 5px;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        @media (max-width: 768px) {
            .wrapper_chitiet {
                flex-direction: column;
            }
            .hinhanh_sanpham, .chitiet_sanpham {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="product-title">Chi Tiết Sản Phẩm</h1>
        <?php
        $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
        $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
        while($row_chitiet = mysqli_fetch_array($query_chitiet)){
        ?>
        <div class="wrapper_chitiet">
            <div class="hinhanh_sanpham">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" alt="<?php echo $row_chitiet['tensanpham'] ?>">
            </div>
            <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                <div class="chitiet_sanpham">
                    <h3><?php echo $row_chitiet['tensanpham'] ?></h3>
                    <p><strong>Mã Sản Phẩm:</strong> <?php echo $row_chitiet['masp'] ?></p>
                    <p><strong>Giá:</strong> <?php echo number_format($row_chitiet['giasp'],0,',','.').' VNĐ' ?></p>
                    <p><strong>Số lượng còn lại:</strong> <?php echo $row_chitiet['soluong']?></p>
                    <p><strong>Danh Mục:</strong> <?php echo $row_chitiet['tendanhmuc']?></p>
                    <input class="themgiohang" name="themgiohang" type="submit" value="Thêm Vào Giỏ Hàng">
                    <div class="product-meta">
                        <div class="meta-item">
                            <i class="fas fa-truck"></i>
                            <p>Giao hàng nhanh</p>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-undo"></i>
                            <p>Đổi trả 30 ngày</p>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-shield-alt"></i>
                            <p>Bảo hành 12 tháng</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>