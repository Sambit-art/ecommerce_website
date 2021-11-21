<?php

require_once('./db.php');
require_once('./navbar.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $connection->prepare("SELECT *, COUNT(*) FROM users WHERE username= ? AND password = ?");
    $stmt->execute([$username, $password]);
    $res = $stmt->fetch();
    echo "<pre>";
    var_dump($res);
    echo "</pre>";
    if (((int)$res[6]) === 1) {
        session_start();
        $_SESSION["user_id"] = (int)$res[0];
        $_SESSION["username"] = $res[1];
        $_SESSION["password"] = $res[2];
        $_SESSION["fullname"] = $res[3];
        $_SESSION["address"] = $res[4];
        $_SESSION["date"] = $res[5];
        header("Location: http://localhost/e_commerce/");
    } else {
        echo "failed";
    }
}


?>


<div x-data="{ isOpen: true }">
    <div x-show="isOpen">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <h6>Signup Here</h6>
            <div class="input-field col">
                <input id="username" name="username" type="text" class="validate">
                <label for="username">username</label>
            </div>
            <div class="input-field col">
                <input id="password" name="password" type="text" class="validate">
                <label for="password">password</label>
            </div>
            <input class="indigo acent-4 waves-effect waves-light btn" style="margin:20px" type="submit" name="submit" value="Submit">
        </form>
    </div>
    <div x-show="!isOpen">
        <form action="signup.php" method="post">
            <h6>Signup Here</h6>
            <div class="input-field col">
                <input id="username" name="username" type="text" class="validate">
                <label for="username">username</label>
            </div>
            <div class="input-field col">
                <input id="fullname" name="fullname" type="text" class="validate">
                <label for="fullname">fullname</label>
            </div>
            <div class="input-field col">
                <input id="email" name="email" type="text" class="validate">
                <label for="email">email</label>
            </div>
            <div class="input-field col">
                <input id="password" name="password" type="text" class="validate">
                <label for="password">password</label>
            </div>
            <input class="indigo acent-4 waves-effect waves-light btn" style="margin:20px" type="submit" name="submit" value="Submit">
        </form>
    </div>
    <button class="teal acent-2 waves-effect waves-light btn " @click=" isOpen = !isOpen" style="margin:20px">Login/Signup</button>
</div>