<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin liên hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .contact-info {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
            margin-left: 200px;
        }
        .contact-info h2 {
            color: #0d6efd;
            margin-bottom: 20px;
        }
        .contact-item {
            margin-bottom: 15px;
        }
        .contact-item i {
            color: #0d6efd;
            margin-right: 10px;
            font-size: 1.2em;
        }
        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .form-container h2 {
            color: #0d6efd;
            margin-bottom: 20px;
            margin-left: 90px;
        }
        textarea.form-control {
            resize: vertical;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <h2><i class="bi bi-person-lines-fill"></i> Thông tin liên hệ</h2>
                    <div class="contact-item">
                        <i class="bi bi-person"></i> Huỳnh Giang Hữu Tuấn
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-envelope"></i> tuan12678999@gmail.com
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-telephone"></i> 0702085106
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h2><i class="bi bi-pencil-square"></i> Cập nhật thông tin</h2>
                    <?php
                    $sql_lh = "SELECT * FROM tbl_lienhe WHERE id=1";
                    $query_lh = mysqli_query($mysqli, $sql_lh);
                    while($dong = mysqli_fetch_array($query_lh)) {
                    ?>
                    <form method="POST" action="modules/thongtinweb/xuly.php?id=<?php echo $dong['id']?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="thongtinlienhe" class="form-label">Thông tin liên hệ</label>
                            <textarea class="form-control" id="thongtinlienhe" name="thongtinlienhe" rows="5"><?php echo $dong['thongtinlienhe'] ?></textarea>
                        </div>
                        <button type="submit" name="submitlienhe" class="btn btn-primary">Cập nhật</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>