<?php
if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
    unset($_SESSION['dangnhap']);
    header('Location:login.php');
}
?>
<div class="admin-logout">
    <a href="index.php?dangxuat=1" class="logout-button">
        <span class="logout-icon">↩</span>
        <span class="logout-text">Đăng Xuất: <?php echo isset($_SESSION['dangnhap']) ? $_SESSION['dangnhap'] : ''; ?></span>
    </a>
</div>
<style>
    /* ... (previous CSS remains the same) ... */

/* Admin Logout Button Styles */
.admin-logout {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 1000;
}

.logout-button {
    display: flex;
    align-items: center;
    background-color: #e74c3c;
    color: #ffffff;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.logout-button:hover {
    background-color: #c0392b;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
}

.logout-icon {
    font-size: 20px;
    margin-right: 10px;
    transition: transform 0.3s ease;
}

.logout-button:hover .logout-icon {
    transform: rotate(-90deg);
}

.logout-text {
    font-size: 14px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .admin-logout {
        position: static;
        margin-top: 20px;
        text-align: center;
    }

    .logout-button {
        display: inline-flex;
    }
}

/* ... (rest of the previous CSS remains the same) ... */
</style>