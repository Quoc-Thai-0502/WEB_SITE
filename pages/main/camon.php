<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn quý khách</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        .thank-you-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 600px;
            width: 90%;
            height: 350px;
            margin-top: 50px;
            margin-left: 80px;
        }

        .thank-you-icon {
            font-size: 64px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p1 {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .order-number {
            font-weight: bold;
            color: #4CAF50;
        }

        .cta-button1 {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            margin-top: 50px;
            margin-left: 290px;
            transition: background-color 0.3s ease;
        }

        .cta-button1:hover {
            background-color: #45a049;
        }

        @media (max-width: 480px) {
            .thank-you-container {
                padding: 30px;
            }

            h2 {
                font-size: 24px;
            }

            p1 {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <div class="thank-you-icon">&#10004;</div>
        <h2>Cảm ơn quý khách đã mua hàng!</h2>
        <p1>Chúng tôi xin chân thành cảm ơn quý khách đã tin tưởng và lựa chọn sản phẩm của chúng tôi. Đơn hàng của quý khách đã được xác nhận và đang được xử lý.</p1>
        <p1>Chúng tôi sẽ gửi email xác nhận cùng với thông tin chi tiết về đơn hàng và thời gian giao hàng dự kiến.</p1>
    </div>
        <a href="index.php" class="cta-button1">Tiếp tục mua sắm</a>
</body>
</html>