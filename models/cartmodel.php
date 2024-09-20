<?php
include_once __DIR__ . '/../config/database.php';

function addToCart($kode_user, $productId) {
    $conn = connectDatabase();
    $query = "SELECT * FROM cart WHERE kode_user = ? AND kode_barang = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $kode_user, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $query = "UPDATE cart SET quantity = quantity + 1 WHERE kode_user = ? AND kode_barang = ?";
    } else {
        $query = "INSERT INTO cart (kode_user, kode_barang, quantity) VALUES (?, ?, 1)";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $kode_user, $productId);
    return $stmt->execute();
}

function getCartItemCount($kode_user) {
    $conn = connectDatabase();
    $query = "SELECT SUM(quantity) AS total_items FROM cart WHERE kode_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $kode_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['total_items'] ? $row['total_items'] : 0;
}

function getProductDetails($productId, $kode_user) {
    $conn = connectDatabase();
    $query = "
        SELECT 
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
            mr.nilai AS rating,
            c.quantity,
            c.id
        FROM 
            master_barang mb
        LEFT JOIN 
            master_gambar mg ON mb.kode_barang = mg.kode_barang
        LEFT JOIN 
            master_kategori mk ON mb.kode_kategori = mk.kode_kategori
        LEFT JOIN 
            master_rating mr ON mb.kode_barang = mr.kode_barang
        LEFT JOIN
            cart c ON mb.kode_barang = c.kode_barang  
        WHERE 
            mb.kode_barang = ? AND c.kode_user = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $productId, $kode_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        return [
            'kode_barang' => $product['kode_barang'],
            'nama_barang' => $product['nama_barang'],
            'jumlah_stok' => $product['jumlah_stok'],
            'varian' => $product['varian'],
            'harga' => $product['harga'],
            'url_gambar' => $product['url_gambar'],
            'quantity' => $product['quantity'],
            'ide' => $product['id'],
        ];
    } else {
        return null;
    }
    $stmt->close();
    $conn->close();
}

function getCartItemsByUserId($kode_user) {
    $conn = connectDatabase();
    $query = "
        SELECT 
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
            mr.nilai AS rating,
            c.quantity,
            c.id
        FROM 
            master_barang mb
        LEFT JOIN 
            master_gambar mg ON mb.kode_barang = mg.kode_barang
        LEFT JOIN 
            master_kategori mk ON mb.kode_kategori = mk.kode_kategori
        LEFT JOIN 
            master_rating mr ON mb.kode_barang = mr.kode_barang
        LEFT JOIN
            cart c ON mb.kode_barang = c.kode_barang  
        WHERE 
            c.kode_user = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $kode_user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function removeFromCart($kode_user, $productId) {
    $conn = connectDatabase();
    $query = "DELETE FROM cart WHERE kode_user = ? AND id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $kode_user, $productId);
    return $stmt->execute();
}
?>
