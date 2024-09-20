<?php
include_once __DIR__ . '/../models/cartmodel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add' && isset($_POST['product_id']) && isset($_POST['user_id'])) {
        $productId = $_POST['product_id'];
        $kode_user = $_POST['user_id'];

        $result = addToCart($kode_user, $productId);

        if ($result) {
            $productDetails = getProductDetails($productId, $kode_user);
            $response = ['success' => true, 'cart_count' => getCartItemCount($kode_user), 'product' => $productDetails];
        } else {
            $response = ['success' => false];
        }

        echo json_encode($response);
    } elseif ($_POST['action'] === 'get') {
        $userId = $_POST['user_id'];
        $cartItems = getCartItemsByUserId($userId);

        echo json_encode([
            'success' => true,
            'cart_items' => $cartItems
        ]);
        exit();
    }

    if (isset($_POST['action']) && $_POST['action'] == 'remove' && isset($_POST['product_id']) && isset($_POST['user_id'])) {
        $productId = $_POST['product_id'];
        $kode_user = $_POST['user_id'];

        $result = removeFromCart($kode_user, $productId);

        if ($result) {
            $response = ['success' => true, 'cart_count' => getCartItemCount($kode_user)];
        } else {
            $response = ['success' => false];
        }

        echo json_encode($response);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'count' && isset($_GET['user_id'])) {
        $kode_user = $_GET['user_id'];
        $cart_count = getCartItemCount($kode_user);

        $response = ['cart_count' => $cart_count];
        echo json_encode($response);
    }
}
