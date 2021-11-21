<?php
require_once('./navbar.php');
require_once('./db.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/e_commerce/account.php");
}

$userId = htmlspecialchars($_SESSION['user_id']);
$stmt = $connection->prepare("SELECT * FROM `cart` INNER JOIN products ON cart.product_id= products.product_id WHERE cart.user_id=?");
$stmt->execute([$userId]);
$products = $stmt->fetchAll();
$total_value = 0;
// echo "<pre>";
// print_r($products);
// echo "</pre>";
?>
<div class="row" style="margin-top: 30px;">
    <div class="col s12 m4 l5 " style="padding: 30px;">
        <?php

        foreach ($products as $product) {
            global $total_value;
            $total_value += $product[5];
            echo '<div class="row card" style="padding:30px">';
            echo '<img src="images/' . $product[4] . '" alt="img" class="col s3">';
            echo '<div class="col s8">';
            echo '<p class="col s12" style="display: block;">' . $product[3] . '</p>';
            echo '<p class="col s6">' . $product[5] . '</p>';
            echo '<a class="red accent-3 col s3 waves-effect waves-light btn" href=""> <i class="material-icons">delete</i></a>';
            echo '</div>';
            echo '</div>';
        };

        ?>
    </div>
    <div class="col s12 m4 l5 offset-m3 offset-l2 card z-depth-2" style="padding: 30px;">
        <h4 class="red-text text-accent-4">Order Details</h4>
        <hr>
        <h6>
            <?php echo $_SESSION["fullname"]; ?>
            <br>
            Address- <span>
                <?php echo $_SESSION["address"]; ?>
            </span></h6>
        <form action="order_placed.php" method="post" style="margin-top: 50px;">
            <p>
                <label>
                    <input name="group1" type="radio" checked />
                    <span>Cash on delivery</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="group1" type="radio" disabled="disabled" />
                    <span>Credit Card</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="group1" type="radio" disabled="disabled" />
                    <span>Net Banking</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="group1" type="radio" disabled="disabled" />
                    <span>Wallet</span>
                </label>
            </p>

            <!-- <input class="waves-effect waves-light btn" type="submit" value="Proceed to pay (Total 1054)" /> -->

            <button class=" purple darken-4 btn waves-effect waves-light" type="submit" name="action">Proceed to pay (Total <?php echo $total_value; ?>)
                <i class="material-icons right"></i>
            </button>
        </form>
    </div>
</div>
<?php require_once('./bottom.php') ?>