<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<nav class="admin-nav">
  <ul class="admin-menu">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them"><i class="fas fa-tags"></i>Quản Lý Danh Mục Sản Phẩm</a></li>
    <li><a href="index.php?action=quanlysp&query=them"><i class="fas fa-box-open"></i>Quản Lý Sản Phẩm</a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them"><i class="fas fa-file-alt"></i>Quản Lý Bài Viết</a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them"><i class="fas fa-folder-open"></i>Quản Lý Danh Mục Bài Viết</a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke"><i class="fas fa-shopping-cart"></i>Quản Lý Đơn Hàng</a></li>
    <li><a href="index.php?action=quanlyweb&query=capnhat"><i class="fas fa-cogs"></i>Quản Lý Website</a></li>
  </ul>
</nav>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');

.admin-nav {
  background: #2c3e50;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  font-family: 'Roboto', sans-serif;
}

.admin-menu {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.admin-menu li {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.admin-menu li:last-child {
  border-bottom: none;
}

.admin-menu li a {
  display: flex;
  align-items: center;
  color: #ecf0f1;
  text-decoration: none;
  padding: 15px 20px;
  transition: all 0.3s ease;
  font-size: 16px;
  font-weight: 400;
}

.admin-menu li a i {
  margin-right: 15px;
  font-size: 18px;
  width: 20px;
  text-align: center;
  transition: all 0.3s ease;
}

.admin-menu li a:hover {
  background-color: #34495e;
  color: #3498db;
}

.admin-menu li a:hover i {
  transform: scale(1.2);
  color: #3498db;
}

/* Active menu item */
.admin-menu li a.active {
  background-color: #3498db;
  color: #fff;
  position: relative;
}

.admin-menu li a.active::after {
  content: '';
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  border-left: 6px solid #fff;
  border-top: 6px solid transparent;
  border-bottom: 6px solid transparent;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .admin-menu li a {
    padding: 12px 15px;
    font-size: 14px;
  }
  
  .admin-menu li a i {
    font-size: 16px;
  }
}

/* Hover effect */
.admin-menu li a::before {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 0;
  background-color: #3498db;
  transition: width 0.3s ease;
}

.admin-menu li a:hover::before {
  width: 100%;
}
</style>