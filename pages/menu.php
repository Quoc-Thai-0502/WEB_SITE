<?php
 
    $sql_danhmuc  = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);

?>
<?php
 if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangky']);

 }
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="menu">
            <ul class="list_menu">
                <li><a href="./index.php"><i class="bi bi-house"></i> Trang Chủ</a></li>
                <?php
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <!-- <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li> -->
                <?php
                }

                ?>

                <li><a href="index.php?quanly=giohang "><i class="bi bi-cart4"></i> Giỏ Hàng </a></li>
                
                
                <?php
                 if(isset($_SESSION['dangky'])){
                ?>
                 <li><a href="index.php?dangxuat=1"><i class="bi bi-box-arrow-left"></i> Đăng Xuất </a></li>
                <?php
                 }else{
                ?>
                    <li><a href="index.php?quanly=dangky"><i class="bi bi-person-plus"></i> Đăng Ký </a></li>
                <?php
                 }
                ?>

               

                <li><a href="index.php?quanly=tintuc"><i class="bi bi-newspaper"></i> Tin Tức </a></li>
                <li><a href="index.php?quanly=lienhe"><i class="bi bi-telephone"></i> Liên Hệ </a></li>
                   
                <p> 
                <form action="index.php?quanly=timkiem" method="POST" class="search-form">
                <div class="search-container">
                    <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa" class="search-input">
                    <button type="submit" name="timkiem" class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            </p>
            <style>
            .search-form {
                max-width: 300px;
                margin-right: -320px;
                margin-left: 115px;
            }

            .search-container {
                display: flex;
                border-radius: 30px;
                overflow: hidden;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                margin-right: -80px;
            }

            .search-container:hover,
            .search-container:focus-within {
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }

            .search-input {
                flex-grow: 1;
                border: none;
                padding: 12px 20px;
                font-size: 16px;
                outline: none;
                transition: background-color 0.3s ease;
            }

            .search-input:focus {
                background-color: #f0f0f0;
            }

            .search-button {
                background-color: black;
                color: white;
                border: none;
                padding: 12px 20px;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .search-button:hover {
                background-color: black;
            }

            /* Responsive design */
            @media (max-width: 600px) {
                .search-form {
                    max-width: 100%;
                }
                
                .search-input {
                    font-size: 14px;
                }
                
                .search-button {
                    padding: 12px 15px;
                }
            }
            </style>
                
            </ul>
            
        </div>  