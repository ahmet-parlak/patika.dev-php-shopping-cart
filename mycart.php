<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCart</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="snackbar"></div>
    <div class="header">
        <div class="navbar">
            <div class="nav-item cart" title="Go to Cart">
                <a href="mycart.php" class=""><i class="cart slide"></i></a>
                <div class="nav-title">MyCart</div>
            </div>
            <div class="nav-item home" title="Home">
                <a href="index.php" class=""><i class="home"></i></a>
                <div class="nav-title">Home</div>
            </div>
        </div>
    </div>
    <div class="main">
        <h1>MyCart</h1>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Increase</th>
                    <th>Decrease</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
                $totalQuantity = 0;
                $productCount = 0;
                foreach ($cart as $product => $quantity) {
                    $productCount++;
                    $totalQuantity += $quantity;
                ?>
                    <tr>
                        <td><img src="assets/images/products/<?= $product ?>.jpg" alt="<?= $product ?>"></td>
                        <td><?= $product ?></td>
                        <td class="quantity"><?= $quantity ?></td>
                        <td><a class="increase-product" product="<?= $product ?>"><i class="cart-plus slide"></i></a></td>
                        <td><a class="decrease-product" product="<?= $product ?>"><i class="cart-minus slide"></i></a></td>
                        <td><a class="remove-product" product="<?= $product ?>"><i class="cart-cross slide"></i></a></td>
                    </tr>
                <?php } ?>

                <!-- Cart is empty -->
                <?php if (count($cart) == 0) { ?>
                    <tr>
                        <td colspan="6">
                            <h2>Your cart is empty</h2>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <?php if (count($cart) != 0) { ?>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th class="product-count"><?= $productCount ?></th>
                        <th class="total-quantity"><?= $totalQuantity ?></th>
                        <th colspan="3"><a class="remove-cart" title="Empty the Cart"><i class="cart-cross slide"></i></a></th>
                    </tr>
                </tfoot>
            <?php } ?>
        </table>
    </div>
    <div class="footer"></div>

    <!-- JavaScript -->
    <script type="module" src="js/main.js"></script>
    <script type="module" src="js/cart.js"></script>
</body>

</html>