<p> Liệt Kê Đơn Hàng</p>
<?php
    $sql_lietke_dh ="SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky  ORDER BY tbl_cart.id_cart DESC ";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>

<p>Liệt Kê Sản Phẩm</p>
<table style="width: 100%" border="1" style="border-collapse: collapse">

  <tr>
    <th>id</th>
    <th>Mã Đơn Hàng</th>
    <th>Tên Khách Hàng</th>
    <th>Địa Chỉ</th>
    <th>Email</th>
    <th>Số Điện Thoại</th>
    <th>Tình Trạng</th>
    <th>Quản Lý</th>

  </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
        <?php if($row['cart_status'] == 1){
            echo '<a a href="moduels/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn Hàng Mới</a>';
        }
        ?>
    </td>
    <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem Đơn Hàng</a>

  </tr>
  <?php
}
  ?>

</table>

<style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .status-new {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .status-new:hover {
            background-color: #27ae60;
        }
        .action-link {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        .action-link:hover {
            color: #2980b9;
        }
    </style>