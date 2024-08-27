<!-- HTML Structure -->
<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc= '$_GET[id]' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
// get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc= '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<section class="product-category">
    <h2 class="category-title">Danh Mục Sản Phẩm: <?php echo $row_title['tendanhmuc'] ?></h2>
    <div class="product-grid">
        <?php while ($row_pro = mysqli_fetch_array($query_pro)) { ?>
            <div class="product-card">
                <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="product-link">
                    <div class="product-image-container">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>" alt="<?php echo $row_pro['tensanpham']?>" class="product-image">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><?php echo $row_pro['tensanpham']?></h3>
                        <p class="product-price"><?php echo number_format($row_pro['giasp'], 0, ',', '.').' VNĐ'?></p>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</section>

<style>
/* Additional CSS for the improved product listing */
.product-category {
    padding: 40px 0;
}

.category-title {
    font-size: 28px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 30px;
    margin-left: -300px;
    color: #2c3e50;
    position: relative;
    padding-bottom: 15px;
}

.category-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(45deg, #3498db, #2980b9);
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
    padding: 20px;
}

.product-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: all 0.3s ease;
    animation: fadeInUp 0.6s ease-out forwards;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.product-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.product-image-container {
    position: relative;
    overflow: hidden;
    padding-top: 75%; /* 4:3 Aspect Ratio */
}

.product-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

.product-info {
    padding: 15px;
}

.product-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #2c3e50;
}

.product-price {
    font-size: 16px;
    font-weight: 700;
    color: #e74c3c;
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

/* Responsive design */
@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
}
</style>