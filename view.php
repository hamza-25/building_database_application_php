<?php
session_start();
if (!isset($_SESSION['name']) ) {
    die('Not logged in');
}
if (isset($_SESSION["name"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <title>dc5d86e5</title>
    </head>

    <body>
        <h1>Tracking Autos for <?php echo $_SESSION["name"]; ?></h1>
        <p style='color:green;'>
            <?php
            if(isset($_SESSION["success"])){
                echo $_SESSION["success"];
                unset($_SESSION["success"]);
            }
            ?>
        </p>
        <h2>Automobiles</h2>

        <ul>
            <?php
            require_once "pdo.php";
            $stmt = $conn->query('select * from misc.autos');

            while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li>' . $rows['year']  . ' ' . $rows["make"]   . ' / ' . $rows['mileage'] .  '</li>';
            }
            ?>
        </ul>

        <p><a href="add.php">Add New </a> | <a href="logout.php">Logout</a></p>
    </body>

    </html>
<?php
} 
?>