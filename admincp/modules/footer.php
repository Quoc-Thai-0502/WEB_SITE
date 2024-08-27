<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<footer class="admin-footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4>Truy cập nhanh</h4>
            <ul>
                <li><a href="index.php"><i class="fas fa-tachometer-alt"></i>Bảng điều khiển</a></li>
                <li><a href="index.php?action=quanlysp&query=them"><i class="fas fa-box"></i>Quản lý sản phẩm</a></li>
                <li><a href="index.php?action=quanlydonhang&query=lietke"><i class="fas fa-shopping-cart"></i>Quản lý đơn hàng</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Hỗ trợ</h4>
            <ul>
                <li><a href="#"><i class="fas fa-question-circle"></i>Trung tâm trợ giúp</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i>Liên hệ quản trị viên</a></li>
                <li><a href="#"><i class="fas fa-bug"></i>Báo cáo sự cố</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Pháp lý</h4>
            <ul>
                <li><a href="#"><i class="fas fa-shield-alt"></i>Chính sách bảo mật</a></li>
                <li><a href="#"><i class="fas fa-file-contract"></i>Điều khoản dịch vụ</a></li>
                <li><a href="#"><i class="fas fa-cookie"></i>Chính sách cookie</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
    </div>
</footer>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');

.admin-footer {
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 50px 0 30px;
    margin-top: 50px;
    border-top: 5px solid #3498db;
    font-family: 'Roboto', sans-serif;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-section {
    flex: 1;
    min-width: 250px;
    margin-bottom: 30px;
}

.footer-section h4 {
    color: #3498db;
    font-size: 20px;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
    font-weight: 500;
}

.footer-section h4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background-color: #3498db;
}

.footer-section ul {
    list-style-type: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 12px;
}

.footer-section ul li a {
    color: #bdc3c7;
    text-decoration: none;
    transition: color 0.3s ease, transform 0.3s ease;
    display: flex;
    align-items: center;
}

.footer-section ul li a i {
    margin-right: 10px;
    font-size: 16px;
    color: #3498db;
    transition: transform 0.3s ease;
}

.footer-section ul li a:hover {
    color: #3498db;
    transform: translateX(5px);
}

.footer-section ul li a:hover i {
    transform: scale(1.2);
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    margin-top: 30px;
    border-top: 1px solid #34495e;
}

.footer-bottom p {
    font-size: 14px;
    color: #95a5a6;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: center;
    }

    .footer-section {
        width: 100%;
        text-align: center;
        margin-bottom: 40px;
    }

    .footer-section h4::after {
        left: 50%;
        transform: translateX(-50%);
    }

    .footer-section ul li a {
        justify-content: center;
    }
}
</style>