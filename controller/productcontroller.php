<?php
require_once 'models/productmodel.php';

function showProductDetail($id)
{
    global $conn; 
    $product = getProductById($conn, $id);
    if ($product) {
        require 'detailProduct.php';
    } else {
        echo "Produk tidak ditemukan!";
    }
}
function showAllProducts()
{
    global $conn;
    require_once 'models/productmodel.php';
    $products = getAllProducts($conn);

    if ($products) {
        require 'displayproduk.php';
    }
}
function showProductsByCategory($category)
{
    global $conn;
    require_once 'models/productmodel.php';
    $products = getProductsByCategory($conn, $category);

    if ($products) {
        require 'displayproduk.php';
    }
}
function showProductsBySearch($search)
{
    global $conn;
    require_once 'models/productmodel.php';
    $products = searchProducts($conn, $search);

    if ($products) {
        require 'displayproduk.php';
    }
}

function getFilteredProductss($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder, $category = null, $keyword = null)
{
    return getFilteredProducts($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder, $category, $keyword);
}
