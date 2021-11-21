<h2>Deals of the day</h2>
<div class="part">
    <?php
    require_once('db.php');
    $stmt = $connection->prepare("SELECT * FROM products");
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo '<div class="row">';
    foreach ($result as $a) {
        echo '<div class="col s6 m4 l2 " style="margin-left:30px;height: 200px;"><a href="http://127.0.0.1/e_commerce/product.php?product_id=' . $a['product_id'] . '">';
        echo '<img class="col s12" src="' . './images/' . $a['product_img'] . '" alt="img">';
        echo '<div class="">';
        echo '<br><span>' . $a['product_price'], '/-</span>';
        echo '</div>';
        echo '</a></div>';
    }
    echo '</div>';
    ?>
</div>