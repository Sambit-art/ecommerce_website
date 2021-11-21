<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E comm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>

    <nav class="black">
        <div class="nav-wrapper container">
            <a href="http://localhost/e_commerce/" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="http://localhost/e_commerce/cart.php">Cart</a></li>
                <li><a href="badges.html">
                        <?php if (isset($_SESSION["username"])) {
                            echo $_SESSION["username"];
                        } else {
                            echo "";
                        }
                        ?>
                    </a>
                </li>
                <li><a href="http://localhost/e_commerce/destroy.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">