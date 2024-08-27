<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_mysqli";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }


// Tăng số lượt truy cập
$sql = "UPDATE page_views SET view_count = view_count + 1 WHERE id = 1";
$conn->query($sql);

// Lấy giá trị hiện tại
$sql = "SELECT view_count FROM page_views WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $row['view_count'];

$conn->close();

echo "This page has been visited $count times.";
} catch (Exception $e) {
    // echo "Error: " . $e->getMessage();
}
?>