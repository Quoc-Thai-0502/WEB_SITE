<!-- HTML Structure -->
<aside class="sidebar">
    <h2 class="sidebar-title">Danh Mục Sản Phẩm</h2>
    <nav class="category-nav">
        <ul class="category-list">
            <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
            while($row = mysqli_fetch_array($query_danhmuc)){
            ?>
                <li class="category-item">
                    <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>" class="category-link">
                        <?php echo $row['tendanhmuc'] ?>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </nav>
</aside>

<style>
/* Sidebar Styles */
.sidebar {
    background: linear-gradient(135deg, #f6f8fa 0%, #e9ecef 100%);
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    
    border: 0px solid #000066;
    height: 600px;
    width: 20%;
    margin-left: 5px;
    margin-top: 5px;
    float: left;  
}


.sidebar-title {
    font-size: 24px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    text-align: center;
    position: relative;
    padding-bottom: 10px;
}

.sidebar-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: linear-gradient(45deg, #3498db, #2980b9);
}

.category-list {
    list-style-type: none;
    padding: 0;
}

.category-item {
    margin-bottom: 10px;
    opacity: 0;
    transform: translateX(-20px);
    animation: slideIn 0.5s ease forwards;
}

.category-item:nth-child(odd) {
    animation-delay: 0.1s;
}

.category-item:nth-child(even) {
    animation-delay: 0.2s;
}

.category-link {
    display: block;
    padding: 10px 15px;
    color: #34495e;
    text-decoration: none;
    font-weight: 500;
    border-radius: 5px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.category-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent, rgba(52, 152, 219, 0.2), transparent);
    transition: all 0.5s ease;
}

.category-link:hover {
    background-color: #FFD700;
    color: #2980b9;
    transform: translateX(5px);
}

.category-link:hover::before {
    left: 100%;
}

@keyframes slideIn {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive design */
@media (max-width: 768px) {
    .sidebar {
        margin-bottom: 20px;
    }

    .category-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .category-item {
        margin: 5px;
    }

    .category-link {
        padding: 8px 12px;
        font-size: 14px;
    }
}
</style>