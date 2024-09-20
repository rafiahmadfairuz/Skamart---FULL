<?php
require_once 'config/database.php';
$conn = connectDatabase();
$sql = "SELECT 
    mb.kode_barang, 
    mb.nama_barang, 
    mb.satuan,
    mb.diskon,
    mg.jumlah_stok,
    mg.varian,
    mk.nama_kategori, 
    mg.harga,
    mg.url_gambar,
     mg.kode_gambar,
    mr.nilai AS rating
FROM 
    master_barang mb
LEFT JOIN 
    master_gambar mg ON mb.kode_barang = mg.kode_barang
LEFT JOIN 
    master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
    master_rating mr ON mb.kode_barang = mr.kode_barang";
$products = $conn->query($sql);


function getAllProducts($conn)
{
    $stmt = $conn->prepare("SELECT 
    mb.kode_barang, 
    mb.nama_barang, 
    mb.satuan,
    mb.diskon,
    mg.jumlah_stok,
    mg.varian,
    mk.nama_kategori, 
    mg.harga,
    mg.url_gambar,
    mg.kode_gambar,
    mr.nilai AS rating
FROM 
    master_barang mb
LEFT JOIN 
    master_gambar mg ON mb.kode_barang = mg.kode_barang
LEFT JOIN 
    master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
    master_rating mr ON mb.kode_barang = mr.kode_barang");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


// Detail Produk
function getProductById($conn, $id)
{
    $sql = "SELECT 
    mb.kode_barang, 
    mb.nama_barang, 
    mb.satuan,
    mb.diskon,
    mg.jumlah_stok,
    mg.varian,
    mk.nama_kategori, 
    mg.harga,
    mg.url_gambar,
    mb.keterangan_detail,
     mg.kode_gambar,
    mr.nilai AS rating
FROM 
    master_barang mb
LEFT JOIN 
    master_gambar mg ON mb.kode_barang = mg.kode_barang
LEFT JOIN 
    master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
    master_rating mr ON mb.kode_barang = mr.kode_barang
WHERE 
    mb.kode_barang = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch data produk
    $product = $result->fetch_assoc();

    // Tutup koneksi
    $stmt->close();

    return $product;
}
function getFilteredProducts($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder, $category = null, $keyword = null)
{
    $sql = "SELECT 
    mb.kode_barang, 
    mb.nama_barang, 
    mb.satuan,
    mb.diskon,
    mg.jumlah_stok,
    mg.varian,
    mk.nama_kategori, 
    mg.harga,
    mg.url_gambar,
     mg.kode_gambar,
    mr.nilai AS rating
FROM 
    master_barang mb
LEFT JOIN 
    master_gambar mg ON mb.kode_barang = mg.kode_barang
LEFT JOIN 
    master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
    master_rating mr ON mb.kode_barang = mr.kode_barang WHERE 1=1";

    // Filter harga
    if (!empty($minHarga)) {
        $sql .= " AND mg.harga >= " . intval($minHarga);
    }
    if (!empty($maxHarga)) {
        $sql .= " AND mg.harga <= " . intval($maxHarga);
    }

    // Filter stok
    if (!empty($rangeStok)) {
        $sql .= " AND mg.jumlah_stok <= " . intval($rangeStok);
    }

    // Filter rating
    if (!empty($ratingOrder)) {
        if ($ratingOrder == 'highest') {
            $sql .= " ORDER BY mr.nilai DESC";
        } else if ($ratingOrder == 'lowest') {
            $sql .= " ORDER BY mr.nilai ASC";
        }
    }

    // Filter kategori
    if (!empty($category)) {
        $sql .= " AND mk.nama_kategori = '" . $conn->real_escape_string($category) . "'";
    }

    // Filter pencarian
    if (!empty($keyword)) {
        $sql .= " AND mb.nama_barang LIKE '%" . $conn->real_escape_string($keyword) . "%'";
    }

    return $conn->query($sql);
}


// Check if it's an AJAX request
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['minHarga'])) {
    $minHarga = $_GET['minHarga'];
    $maxHarga = $_GET['maxHarga'];
    $rangeStok = $_GET['rangeStok'];
    $ratingOrder = $_GET['ratingOrder'];

    $filteredProducts = getFilteredProducts($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder);

    ob_start(); 
    require 'displayproduk.php';
    $output = ob_get_clean(); 

    echo $output; 
    exit;
}

// memfilter dari kategori
function getProductsByCategory($conn, $category)
{
    $stmt = $conn->prepare("SELECT 
    mb.kode_barang, 
    mb.nama_barang, 
    mb.satuan,
    mb.diskon,
    mg.jumlah_stok,
    mg.varian,
    mk.nama_kategori, 
    mg.harga,
    mg.url_gambar,
    mb.keterangan_detail,
    mg.kode_gambar,
    mr.nilai AS rating
FROM 
    master_barang mb
LEFT JOIN 
    master_gambar mg ON mb.kode_barang = mg.kode_barang
LEFT JOIN 
    master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
    master_rating mr ON mb.kode_barang = mr.kode_barang
WHERE 
    mk.nama_kategori = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function searchProducts($conn, $search)
{
    $search = '%' . $conn->real_escape_string($search) . '%'; 
    $stmt = $conn->prepare("SELECT 
    mb.kode_barang, 
    mb.nama_barang, 
    mb.satuan,
    mb.diskon,
    mg.jumlah_stok,
    mg.varian,
    mk.nama_kategori, 
    mg.harga,
    mg.url_gambar,
    mb.keterangan_detail,
     mg.kode_gambar,
    mr.nilai AS rating
FROM 
    master_barang mb
LEFT JOIN 
    master_gambar mg ON mb.kode_barang = mg.kode_barang
LEFT JOIN 
    master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
    master_rating mr ON mb.kode_barang = mr.kode_barang
WHERE 
    mb.nama_barang = ?");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function searchProductsByKeyword($conn, $keyword)
{
    $stmt = $conn->prepare("SELECT 
        mb.kode_barang, 
        mb.nama_barang, 
        mb.satuan,
        mb.diskon,
        mg.jumlah_stok,
        mg.varian,
        mk.nama_kategori, 
        mg.harga,
        mg.url_gambar,
        mb.keterangan_detail,
        mg.kode_gambar,
        mr.nilai AS rating
    FROM 
        master_barang mb
    LEFT JOIN 
        master_gambar mg ON mb.kode_barang = mg.kode_barang
    LEFT JOIN 
        master_kategori mk ON mb.kode_kategori = mk.kode_kategori
    LEFT JOIN 
        master_rating mr ON mb.kode_barang = mr.kode_barang
    WHERE 
        mb.nama_barang LIKE ?");
    $likeKeyword = "%" . $keyword . "%";
    $stmt->bind_param("s", $likeKeyword);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
