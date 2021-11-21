<?php
include('db.php');

function findUser($connection, $username, $password)
{
    $stmt = $connection->prepare("SELECT * FROM users WHERE username=? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();
    return $user;
}


function sanitize($value)
{
    $data = trim($value);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // global $connection;
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $user = findUser($connection, $username, $password);
    if ($user) {
        var_dump($user);
    } else {
        echo "no user found";
    }
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="username" id=""><br>
        <input type="password" name="password" id=""><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html> -->


<div class="row">
    <div class="col s12 m6 l4  offset-l6" style="margin-top: 30px;">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>