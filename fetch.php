<?php
include("config/database.php");
$query = "SELECT * FROM products WHERE p_status = '1' ORDER BY id DESC";
$products = mysqli_query($conn, $query);
?>