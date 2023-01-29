<?php
/*
$servername = "0.0.0.0:3306";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=misc", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
}catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}*/
?>
<html>

<head>
    <title>
    dc5d86e5
    </title>
</head>

<body>
    <h3>Welcome to database autos </h3>
    <p><a href='login.php'>
    Please Log In
        </a></p>
    <p>Attempt to go to <a href="view.php"> view.php</a> without logging in - it should fail with an error message.</p>
    <p>Attempt to go to <a href="add.php"> add.php</a> without logging in - it should fail with an error message.</p>
</body>

</html>