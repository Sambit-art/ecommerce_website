<?php
require_once('./db.php');

$productId = htmlspecialchars($_GET['product_id']);
$stmt = $connection->prepare("SELECT * FROM products WHERE product_id=?");
$stmt->execute([$productId]);
$product = $stmt->fetch();

require_once('./navbar.php');
// var_dump($product);
?>

<div class="product_page">
    <div class="product_div">
        <img src="<?php echo "images/" . $product['product_img']; ?>" alt="img" />
        <h1 class="heading"><?php echo $product["product_title"]; ?></h1>
        <h4 class="subheading">Price <?php echo $product["product_price"]; ?> /- </h4>
        <h4 class="description">Rating <?php echo $product["product_description"]; ?></h4>
        <div class="rating">
            <?php
            $star = "";
            for ($i = 0; $i < (int)$product['product_rating']; $i++) {
                $star = $star . " *";
            }
            echo '<h1 style="color:Blue">' . $star . '</h1>';
            ?>
        </div>
        <a href="<?php echo "http://localhost/e_commerce/order.php?product_id=" . $productId ?>" class=" purple darken-4 waves-effect waves-light btn">Add to cart</a>
    </div>
</div>


</body>

<?php require_once('./bottom.php') ?>