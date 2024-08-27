<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = '1';
    }
    if($page ==''|| $page == 1){
        $begin = 0;
    }else{
        $begin= ($page*3)-3;
    }
    $sql_pro  = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,3";// LIMIT lay ra bao nhieu san pham
    $query_pro = mysqli_query($mysqli,$sql_pro);

?>
<h3>Sản Phẩm Mới Nhất</h3>
                <ul class="product_list">
                    <?php
                     while($row= mysqli_fetch_array($query_pro)){
                    ?>

                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                            <p class="title_product"> Tên Sản Phẩm: <?php echo $row['tensanpham']?></p>
                            <p class="price_product">Giá:<?php echo number_format( $row['giasp'],0,',','.').'vnđ'?></p>
                            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc']?></p>
                    </li>
                    <?php
                     }
                    ?>

                </ul>
                <div style="clear:both;"></div>
                <style type="text/css">
                    ul.list_trang{
                        padding: 0;
                        margin: 0;
                        list-style: none;
                    }
                    ul.list_trang li{
                        float: left;
                        padding: 5px 13px;
                        margin: 5px;
                        background: burlywood;
                        display: block;
                    }
                    ul.list_trang li a{
                        color: #000;
                        text-align: center;
                        text-decoration: none;
                       
                    }
                </style>
                <?php
                $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
                $row_count = mysqli_num_rows($sql_trang);    
                $trang= ceil( $row_count/4);
                ?>
                <p>Trang Hiện Tại: <?php echo $page ?>/<?php echo $trang  ?></p>
                
                <ul class="list_trang">
                    <?php
                    for($i=1;$i<=$trang;$i++){
                    ?>
                        <li <?php if($i == $page){echo 'style="background: brown;"';}else{echo ''; } ?> ><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                    }
                    ?>
                </ul> 
                <style>
    .product-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h3 {
        font-size: 30px;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
        margin-left: -315px;
        margin-top: 40px;
        position: relative;
    }

    h3::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background: #3498db;
        margin: 15px 715px 0;
    }

    .product_list {
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .product_list li {
        width: calc(25% - 20px);
        margin-bottom: 30px;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .product_list li:hover {
        transform: translateY(-5px);
    }

    .product_list li a {
        text-decoration: none;
        color: #333;
    }

    .product_list li img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .title_product, .price_product {
        padding: 10px 15px;
        margin: 0;
        font-size: 16px;
    }

    .price_product {
        color: #e74c3c;
        font-weight: bold;
    }

    .category {
        text-align: center;
        color: #7f8c8d;
        font-size: 14px;
        padding-bottom: 10px;
    }

    .pagination {
        text-align: center;
        margin-top: 30px;
    }

    .list_trang {
        display: inline-flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list_trang li {
        margin: 0 5px;
        border-radius: 10px;
        background: none;
    }


    .list_trang li a:hover, .list_trang li.active a {
        background: #e67e22;
    }

    .page-info {
        text-align: center;
        margin-bottom: 10px;
        color: #7f8c8d;
    }

    @media (max-width: 768px) {
        .product_list li {
            width: calc(50% - 15px);
        }
    }

    @media (max-width: 480px) {
        .product_list li {
            width: 100%;
        }
    }
</style>