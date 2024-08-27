<?php
$mysqli = new mysqli("127.0.0.1","root","","web_mysqli");

// Check connection
if ($mysqli->connect_errno) {
  echo "Ket Noi MYSQLi Loi " . $mysqli->connect_error;
  exit();
}
?>
