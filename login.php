<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["name"] = $_POST['email'];
    $userPss = $_POST['pass'];
    if (isset($_POST["cancel"])) {
        header("Location: index.php");
        return;
    }

    if (strlen($_SESSION["name"]) > 0 && strlen($userPss) > 0) {

        $storedPss = md5('php123');

        if (filter_var($_SESSION["name"], FILTER_VALIDATE_EMAIL) &&  md5($userPss) == $storedPss) {

            error_log('login success', 0);

            return header("Location: view.php");
        } elseif (!filter_var($_SESSION["name"], FILTER_VALIDATE_EMAIL)) {

            $_SESSION["message"] = 'Email must have an at-sign (@)';
            error_log($_SESSION["message"], 0);
            header("Location: login.php");
            return;
        } elseif ($storedPss != $userPss) {

            $_SESSION["message"] = 'incorrect password';
            error_log($_SESSION["message"], 0);
            header("Location: login.php");
            return;
        };
    } else {

        $_SESSION["message"] = 'Email and password are required';
        header("Location: login.php");
        return;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        dc5d86e5
    </title>
</head>

<body>
    <h3>Please login </h3>
    <p style='color:red;'>
        <?php
        if (isset($_SESSION["message"])) {
            echo  $_SESSION["message"];
            unset($_SESSION["message"]);
        };
        ?>
    </p>
    <form method='POST' action=''>
        email :
        <input type="text" name="email"><br>
        password : <br>
        <input type="password" name="pass">
        <button type='submit'>Log In</button>
        <button type="submit" name="cancel"><a>cancel</a></button>
    </form>
</body>

</html>