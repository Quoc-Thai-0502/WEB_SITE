<?php
include('../../config/config.php');

// Lấy dữ liệu từ form
$tensanpham = mysqli_real_escape_string($mysqli, $_POST["tensanpham"]);
$masp = mysqli_real_escape_string($mysqli, $_POST["masp"]);
$giasp = mysqli_real_escape_string($mysqli, $_POST["giasp"]);
$soluong = mysqli_real_escape_string($mysqli, $_POST["soluong"]);
$tomtat = mysqli_real_escape_string($mysqli, $_POST["tomtat"]);
$noidung = mysqli_real_escape_string($mysqli, $_POST["noidung"]);
$tinhtrang = mysqli_real_escape_string($mysqli, $_POST["tinhtrang"]);
$danhmuc = mysqli_real_escape_string($mysqli, $_POST["danhmuc"]);

// Xử lý hình ảnh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;

if(isset($_POST["themsanpham"])){
    // Thêm sản phẩm
    $sql_them = "INSERT INTO tbl_sanpham (tensanpham, masp, giasp, soluong, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc) 
                VALUES ('$tensanpham', '$masp', '$giasp', '$soluong', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang', '$danhmuc')";
    if(mysqli_query($mysqli, $sql_them)){
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlysp&query=them');
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }

} elseif(isset($_POST['suasanpham'])){
    // Sửa sản phẩm
    if($hinhanh != ''){
        // Xóa hình ảnh cũ
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        // Cập nhật thông tin sản phẩm
        $sql_update = "UPDATE tbl_sanpham 
                       SET tensanpham='$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', hinhanh='$hinhanh', tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc' 
                       WHERE id_sanpham='$_GET[idsanpham]'";
        if(mysqli_query($mysqli, $sql_update)){
            move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        }
    } else {
        // Cập nhật thông tin sản phẩm mà không thay đổi hình ảnh
        $sql_update = "UPDATE tbl_sanpham 
                       SET tensanpham='$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc' 
                       WHERE id_sanpham='$_GET[idsanpham]'";
        mysqli_query($mysqli, $sql_update);
    }
    header('Location:../../index.php?action=quanlysp&query=them');

} else {
    // Xóa sản phẩm
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysp&query=them');
}
?>
