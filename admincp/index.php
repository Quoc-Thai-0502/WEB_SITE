
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    <title>Admincp</title>
</head>
<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }
?>
<body>
    <h3 class="title_admin">Hệ Thống Quản Lý Của Admin</h3>
    <div class="wrapper">
    <?php
            include("config/config.php");
            include("modules/header.php");
            include("modules/menu.php");
            include("modules/main.php");
            include("modules/footer.php");
            
        ?>
    </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('thongtinlienhe');
        </script>
        <style>
                    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f7f9;
            transition: background-color 0.3s ease;
        }

        .wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: box-shadow 0.3s ease;
        }

        .wrapper:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        /* Header styles */
        .title_admin {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: fadeInDown 0.5s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Menu styles */
        .menu {
            background-color: #34495e;
            padding: 10px 0;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .menu ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
        }

        .menu ul li {
            margin: 0 15px;
        }

        .menu ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .menu ul li a:hover {
            background-color: #ecf0f1;
            color: #34495e;
        }

        /* Main content area */
        .main {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Form styles */
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        input[type="text"], input[type="password"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus, textarea:focus, select:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
            outline: none;
        }

        input[type="submit"] {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
            transition: background-color 0.3s ease;
        }

        /* Footer styles */
        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px 0;
            background-color: #34495e;
            color: #ecf0f1;
            border-radius: 0 0 5px 5px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .wrapper {
                padding: 10px;
            }
            
            .menu ul {
                flex-direction: column;
                align-items: center;
            }
            
            .menu ul li {
                margin: 10px 0;
            }
        }

        /* Animation for page load */
        @keyframes pageLoad {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .wrapper > * {
            animation: pageLoad 0.5s ease-out forwards;
        }

        /* CKEditor custom styles */
        .cke_chrome {
            border-color: #bdc3c7 !important;
            box-shadow: none !important;
        }

        .cke_top {
            background: #ecf0f1 !important;
            border-bottom: 1px solid #bdc3c7 !important;
        }
                </style>
</body>
</html>
