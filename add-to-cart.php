<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) {
    $product = $_POST['product'];
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    if (array_key_exists($product, $cart)) {
        $cart[$product]++;
    } else {
        $cart[$product] = 1;
    }
    setcookie('cart', json_encode($cart), time() + 86400, '/', 'localhost', false, true);
    echo json_encode(["success" => "true", "message" => $product . " Added to Cart"]);
} else {
    die("bad request");
}
