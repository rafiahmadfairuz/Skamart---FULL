<?php
session_start();
include_once 'controller/productcontroller.php';
if(!isset($_SESSION["kode_user"])) {
    header('location:LoginRegister/login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $minHarga = $_GET['minHarga'] ?? null;
    $maxHarga = $_GET['maxHarga'] ?? null;
    $rangeStok = $_GET['rangeStok'] ?? null;
    $ratingOrder = $_GET['ratingOrder'] ?? null;
    $category = $_GET['category'] ?? null;
    $keyword = $_GET['search'] ?? null;

    if ($minHarga || $maxHarga || $rangeStok || $ratingOrder || $category || $keyword) {
        $filteredProducts = getFilteredProductss($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder, $category, $keyword);
        
        require 'displayproduk.php'; 
        exit;
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        showProductDetail($id);
    } elseif (isset($_GET['allProducts'])) {
        $products = getAllProducts($conn);
        require 'displayproduk.php';
        exit;
    } else {
        require "halamanutama.php"; 
    }
} else {
    require "halamanutama.php"; 
}
?>
