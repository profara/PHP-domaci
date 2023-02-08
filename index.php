<?php


require "broker.php";
require "model/user.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    $user = new User(1, $uname, $upass);

    $odg = User::logInUser($user, $conn);

    if ($odg->num_rows == 1) {  // vraca result set
        $_SESSION['user_id'] = $user->userID;
        header('Location: home.php');
        exit();
    } else {
        echo "<script>alert('Korisnik ne postoji!')</script>";
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <link href="https://www.dafontfree.net/embed/c3BlY2lmeS1wZXJzb25hbC1ub3JtYWwtYmxhY2smZGF0YS81Mi9zLzE1Njg5Ny9TcGVjaWZ5UEVSU09OQUwtTm9ybUJsYWNrLnR0Zg" rel="stylesheet" type="text/css" />

    <title>Prijava</title>
</head>

<body>
    <nav><a href="index.php">
            <ul id="prva">
                <li style="color:#FFD700"><b>blackberries</b></li>
            </ul>
        </a>

    </nav>

    <form action="#" method="post">
        <div class="container">
            <label class="username">Username</label>
            <input type="text" name="username" class="form-control" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
            <button type="submit" name="submit">Sign In</button>
        </div>
    </form>


</body>

</html>