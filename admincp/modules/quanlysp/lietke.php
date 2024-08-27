<?php
  $sql_lietke_sp ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
  $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
  ?>

<p>Liệt Kê Danh Muc Sản Phẩm</p>
<table style="width: 100%" border="1" style="border-collapse: collapse">

  <tr>
    <th>Id</th>
    <th>Tên Sản Phẩm</th>
    <th>Hình Ảnh</th>
    <th>Giá Sản Phẩm</th>
    <th>Số Lượng</th>
    <th>Danh Mục</th>
    <th>Mã Sản Phẩm</th>
    <th>Tóm Tắt</th>
    <th>Trạng Thái</th>
    <th>Quản Lý</th>

  </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sp)){
        $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php  if($row['tinhtrang']==1){
      echo 'Kích Hoạt';
    }else{
      echo 'Ẩn';
    }
     ?>
     </td>
    <td>
        <a href="modules/quanlysp/suly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> | <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
    </td>

  </tr>
  <?php
}
  ?>

</table>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }
        .status-active {
            color: #27ae60;
            font-weight: bold;
        }
        .status-hidden {
            color: #c0392b;
        }
        .action-links a {
            text-decoration: none;
            color: #3498db;
            margin-right: 10px;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
    </style>