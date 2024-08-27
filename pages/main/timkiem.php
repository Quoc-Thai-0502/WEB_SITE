<?php
    if(isset($_POST['tukhoa'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<h3>Từ Khóa Tìm Kiếm: <?php echo $_POST['tukhoa'] ?></h3>
                <ul class="product_list">
                    <?php
                     while($row= mysqli_fetch_array($query_pro)){
                    ?>

                    <li>
                        <a1 href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                            <p class="title_product"> Tên Sản Phẩm: <?php echo $row['tensanpham']?></p>
                            <p class="price_product">Giá:<?php echo number_format( $row['giasp'],0,',','.').'vnđ'?></p>
                            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc']?></p>
                    </li>
                    <?php
                     }
                    ?>

                </ul>
                <style>

            body {
                font-family: 'Roboto', sans-serif;
                background-color: #f4f4f4;
                color: #333;
                line-height: 1.6;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }

            /* Tiêu đề tìm kiếm */
            h3 {
                font-size: 24px;
                color: #2c3e50;
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 2px solid #3498db;
            }

            /* Danh sách sản phẩm */
            .product_list {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                list-style-type: none;
                padding: 0;
            }

            .product_list li {
                background: white;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                width: calc(25% - 15px);
                overflow: hidden;
            }

            .product_list li:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            }

            .product_list a1 {
                text-decoration: none;
                color: inherit;
                display: block;
            }

            /* Hình ảnh sản phẩm */
            .product_list img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
            }

            /* Thông tin sản phẩm */
            .title_product, .price_product {
                padding: 10px 15px;
                margin: 0;
            }

            .title_product {
                font-size: 16px;
                font-weight: bold;
                color: #2c3e50;
            }

            .price_product {
                font-size: 18px;
                color: #e74c3c;
                font-weight: bold;
            }

            /* Danh mục sản phẩm */
            .product_list li p:last-child {
                background-color: #ecf0f1;
                color: #7f8c8d;
                padding: 5px 15px;
                font-size: 14px;
                margin: 0;
            }

            /* Responsive */
            @media (max-width: 1024px) {
                .product_list li {
                    width: calc(33.33% - 13.33px);
                }
            }

            @media (max-width: 768px) {
                .product_list li {
                    width: calc(50% - 10px);
                }
            }

            @media (max-width: 480px) {
                .product_list li {
                    width: 100%;
                }
            }

            </style>