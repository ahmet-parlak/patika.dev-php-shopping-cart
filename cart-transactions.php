<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transaction'])) {
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : die("bad request");

    switch ($_POST['transaction']) {
        case 'increase-product':
            if (!isset($_POST['product']))  die("bad request");
            $product = $_POST['product'];

            if (array_key_exists($product, $cart)) {
                $cart[$product]++;
            }
            setcookie('cart', json_encode($cart), time() + 86400, '/', 'localhost', false, true);
            echo json_encode(["success" => "true", "message" => $product . " qty has been updated"]);
            break;

        case 'decrease-product':
            if (!isset($_POST['product']))  die("bad request");
            $product = $_POST['product'];


            if (array_key_exists($product, $cart)) {
                $cart[$product]--;
                if ($cart[$product] == 0) unset($cart[$product]); //remove product from cart
            }

            setcookie('cart', json_encode($cart), time() + 86400, '/', 'localhost', false, true);
            echo json_encode(["success" => "true", "message" => $product . " qty has been updated"]);
            break;

        case 'remove-product':
            if (!isset($_POST['product']))  die("bad request");
            $product = $_POST['product'];


            unset($cart[$product]); //remove product from cart
            setcookie('cart', json_encode($cart), time() + 86400, '/', 'localhost', false, true);
            echo json_encode(["success" => "true", "message" => $product . " removed"]);
            break;
        case 'remove-cart':
            setcookie('cart', "", time() - 86400, '/', 'localhost', false, true);
            echo json_encode(["success" => "true", "message" => "Cart removed"]);
            break;
    }
} else {
    die("bad request");
}
