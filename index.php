<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

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
        <h1>PRODUCTS</h1>
        <div class="products-container">
            <div class="products">
                <?php for ($i = 0; $i < 12; $i++) { ?>
                    <div class="product">
                        <div class="product-img">
                            <img src="assets/images/products/product-<?php echo $i+1 ?>.jpg" alt=<?php echo "product-" . $i + 1 ?>>
                        </div>
                        <div class="product-name">
                            Product <?php echo $i + 1 ?>
                        </div>
                        <div class="product-price"> $ 99.00</div>
                        <div class="add-to-cart" product="<?= "product-".$i+1 ?>"><i class="cart-plus slide" title="Add to Cart"></i></div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="footer"></div>

    <!-- JavaScript -->
    <script type="module" src="js/main.js"></script>
</body>

</html>