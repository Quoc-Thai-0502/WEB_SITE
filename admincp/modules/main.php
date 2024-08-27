<div class="clear"></div>
<div class="main">
    <?php
     if(isset($_GET['action']) && $_GET['query']){
        $tam =$_GET['action'];
        $query =$_GET['query'];
    }else{
        $tam = '';
        $query ='';
    }
    if($tam=='quanlydanhmucsanpham' && $query== 'them'){
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
    }elseif($tam=='quanlysp' && $query== 'them'){
        include("modules/quanlysp/them.php");
        include("modules/quanlysp/lietke.php");
    }elseif($tam=='quanlysp' && $query== 'sua'){
        include("modules/quanlysp/sua.php");
    }elseif($tam=='quanlydonhang' && $query== 'lietke'){
        include("modules/quanlydonhang/lietke.php");
    }elseif($tam=='donhang' && $query== 'xemdonhang'){
        include("modules/quanlydonhang/xemdonhang.php");
    }elseif($tam=='quanlyweb' && $query== 'capnhat'){
        include("modules/thongtinweb/quanly.php");
    }
    else{
        include("modules/dashboard.php");
    }
    ?>
</div>
<style>
    /* ... (previous CSS remains the same) ... */

/* Updated Main Content Area Styles */
.clear {
    clear: both;
    height: 0;
    overflow: hidden;
}

.main {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    padding: 30px;
    transition: all 0.3s ease;
    animation: fadeInUp 0.5s ease-out;
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

.main:hover {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Section Styles */
.main section {
    margin-bottom: 30px;
    padding-bottom: 30px;
    border-bottom: 1px solid #e0e0e0;
}

.main section:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

/* Headings */
.main h2 {
    color: #2c3e50;
    font-size: 24px;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #3498db;
    display: inline-block;
}

/* Form Styles within Main */
.main form {
    max-width: 100%;
}

.main input[type="text"],
.main input[type="number"],
.main textarea,
.main select {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #bdc3c7;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.main input[type="text"]:focus,
.main input[type="number"]:focus,
.main textarea:focus,
.main select:focus {
    border-color: #3498db;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    outline: none;
}

.main input[type="submit"] {
    background-color: #2ecc71;
    color: white;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.1s ease;
}

.main input[type="submit"]:hover {
    background-color: #27ae60;
    transform: translateY(-2px);
}

/* Table Styles within Main */
.main table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 20px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
}

.main th, 
.main td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.main th {
    background-color: #3498db;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
}

.main tr:nth-child(even) {
    background-color: #f9f9f9;
}

.main tr:hover {
    background-color: #f0f0f0;
    transition: background-color 0.3s ease;
}

.main td:last-child {
    text-align: center;
}

/* Action Buttons */
.main .action-btn {
    padding: 8px 12px;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.main .edit-btn {
    background-color: #f39c12;
}

.main .edit-btn:hover {
    background-color: #d35400;
}

.main .delete-btn {
    background-color: #e74c3c;
}

.main .delete-btn:hover {
    background-color: #c0392b;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .main {
        padding: 20px;
    }

    .main th, 
    .main td {
        padding: 10px;
    }

    .main .action-btn {
        padding: 6px 10px;
        font-size: 12px;
    }
}

/* ... (rest of the previous CSS remains the same) ... */
</style>