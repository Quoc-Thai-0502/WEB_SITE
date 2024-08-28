<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Web Phụ Kiện Bán Điện Thoại</title>
</head>
<body>
    <div class="wrapper">
        <?php
            session_start();
            include("admincp/config/config.php");
            include("pages/header.php");
            include("pages/menu.php");
            include("pages/main.php");
            include("pages/footer.php");
        ?>
 
    </div>
    <div class="clear"></div>
    

            </div>
            <style>
    .header {
        position: relative;
        width: 100%;
        height: 55px; /* Điều chỉnh chiều cao theo nhu cầu */
        overflow: hidden;
    }

    .slides {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .slides.active {
        opacity: 1;
    }

    #slide1 { background-image: url('/images/banner1.png'); }
    #slide2 { background-image: url('/images/banner2.png'); }
    #slide3 { background-image: url('/images/banner1.png'); }
    #slide4 { background-image: url('/images/banner2.png'); }
</style>


<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slides');

    function showSlides() {
        slides[slideIndex].classList.remove('active');
        slideIndex = (slideIndex + 1) % slides.length;
        slides[slideIndex].classList.add('active');
        setTimeout(showSlides, 3000); // Chuyển đổi mỗi 5 giây
    }

    showSlides();
</script>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

   * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }
        .footer {
            background: linear-gradient(45deg, #ffe610, #e3cc02);
            color: black;
            padding: 30px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            height: 100px;
            width: 100%;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.1);
        }
        
        .footer-content {
            display: flex;
            justify-content: space-around;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto;
            margin-top: -20px;
        }
        .footer-section {
            margin: 10px;
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }
        .footer_copyright {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .footer_visits {
            font-size: 16px;
            font-weight: 300;
        }
        .contact-info {
            font-size: 14px;
            line-height: 1.6;
            text-align: left;
        }
        .social-icons a {
            color: #000000;
            font-size: 24px;
            margin: 0 10px;
            transition: transform 0.3s ease;
        }
        .social-icons a:hover {
            transform: scale(1.2);
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            from { transform: scale(1); }
            to { transform: scale(1.05); }
        }
    </style>

    <div class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <p class="footer_copyright">Liên Hệ</p>
            </div>
            <div class="footer-section contact-info">
                <p><i class="bi bi-envelope"></i> Email: nhomtacgia@gmail.com</p>
                <p><i class="bi bi-telephone"></i> Điện thoại: +84 343 888 776</p>
                <p><i class="bi bi-geo-alt"></i> Địa chỉ: 12 Đường số 42, phường Thảo Điền, Quận 2</p>
            </div>
            <div class="footer-section social-icons">
                <a href="#" style="animation: pulse 2s infinite;"><i class="bi bi-facebook"></i></a>
                <a href="#" style="animation: pulse 2s infinite 0.5s;"><i class="bi bi-twitter"></i></a>
                <a href="#" style="animation: pulse 2s infinite 1s;"><i class="bi bi-instagram"></i></a>
                <a href="#" style="animation: pulse 2s infinite 1.5s;"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>

</html> 
