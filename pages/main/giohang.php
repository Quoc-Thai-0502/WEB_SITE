
<p2>Giỏ Hàng</p2>
<?php
if(isset($_SESSION['dangky'])):
?>
<div class="welcome-message">
    Xin chào, <span class="user-name"><?php echo htmlspecialchars($_SESSION['dangky']); ?></span>!
</div>
<?php
endif;
?>
<style>
    .welcome-message {
        background-color: #f8f9fa;
        border-left: 4px solid #007bff;
        color: #495057;
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        padding: 10px 15px;
        margin: 10px 0;
        border-radius: 0 4px 4px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        display: inline-block;
        margin-left: 25px;
    }

    .welcome-message .user-name {
        color: #007bff;
        font-weight: bold;
        text-transform: capitalize;
    }

    @media (max-width: 768px) {
        .welcome-message {
            font-size: 14px;
            padding: 8px 12px;
        }
    }
</style>
<?php
    if(isset($_SESSION["cart"])){

    }
?>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</div>
<table style="width: 79%;text-align:center; border-collapse:collapse;" border="3">
  <tr>
    <th>Id</th>
    <th>Mã Sản Phẩm</th>
    <th>Tên Sản Phẩm</th>
    <th>Hình Ảnh</th>
    <th>Số Lượng</th>
    <th>Giá Sản Phẩm</th>
    <th>Thành Tiền</th>
    <th>Quản Lý</th>
  </tr>
  <?php
  if(isset($_SESSION["cart"])){
    $i = 0; 
    $tongtien =0;
    foreach($_SESSION["cart"] as $cart_time){
        $thanhtien = $cart_time['soluong']*$cart_time['giasp'];
        $tongtien+=$thanhtien;
        $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $cart_time['masp'];?></td>
    <td><?php echo $cart_time['tensanpham'];?></td>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_time['hinhanh'];?>" width="130px"></td>
    <td>
      <a href="pages/main/themgiohang.php?cong=<?php echo $cart_time['id'] ?>"><i class="bi bi-plus fa-style" aria-hidden="true"></i></a>
      <?php echo $cart_time['soluong'];?>
      <a href="pages/main/themgiohang.php?tru=<?php echo $cart_time['id'] ?>"><i class="bi bi-minus fa-style" aria-hidden="true"></i></a>
    </td>
    <td><?php echo number_format($cart_time['giasp'],0,',','.').'vnđ';?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
    <td class="action-links"><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_time['id'] ?>">Xóa</a></td>
  </tr>
  <?php
    }
    ?>
    <tr class="total-row">
      <td colspan="8">
        <p style="float:left;">Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br/>

      <p style="float:right;"><a href="pages/main/themgiohang.php?xoatatca=1"><svg style="width: 17px; height:15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>Xóa Tất Cả</a></p>
      <div style="clear:both;"></div>
      <?php
        if(isset($_SESSION['dangky'])){
          ?>
            <p><a href="pages/main/thanhtoan.php" class="order-button">Đặt Hàng</a></p>
          </td>
        </tr>
        <?php
        }else{
          ?>
            <p><a href="index.php?quanly=dangky"> Đăng Ký Đặt Hàng</a></p>
      <?php
        }
      ?>
  


    </td>
    
 
  </tr>
    <?php

  }else{
  ?>
  <tr>
  <td colspan="8"><p class="empty-cart">Hiện Tại Giỏ Hàng Trống</p></td>
  </tr>
  <?php
  }
  ?>
  

</table>
<style>
p2 {
    text-align: center;
    color: #2c3e50;
    font-size: 32px;
    font-weight: bold;
    margin-left: 335px;
    margin-bottom: 60px;
    margin-top: 0px;
    
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
}
p2::after {
    content: '';
    display: block;
    width: 100px;
    height: 3px;
    background: #3498db;
    margin-left: 370px;
    margin-bottom: 30px;
}
table {
  width: 100%;
  max-width: 800px;
  margin-left: 350px;
  border-collapse: collapse;
  background-color: #fff;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f8f9fa;
  font-weight: bold;
  text-transform: uppercase;
  color: #333;
}

tr:hover {
  background-color: #f5f5f5;
}

img {
  max-width: 100px;
  height: auto;
  border-radius: 5px;
}

.fa-style {
  color: #007bff;
  margin: 0 5px;
  cursor: pointer;
}

.fa-style:hover {
  color: #0056b3;
}

.action-links a {
  text-decoration: none;
  color: #dc3545;
  font-weight: bold;
}

.action-links a:hover {
  color: #a71d2a;
}

.total-row {
  font-weight: bold;
  background-color: #e9ecef;
}

.total-row td {
  padding: 20px 15px;
}

.order-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #28a745;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.order-button:hover {
  background-color: #218838;
}

.empty-cart {
  text-align: center;
  padding: 50px 0;
  color: #6c757d;
  font-style: italic;
}
</style>