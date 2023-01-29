<?php
if ($_GET['name']) {
    require_once('pdo.php');
    $login = 'login success';
    // $make = htmlspecialchars($_POST['make']);
    // $year = htmlspecialchars($_POST['year']);
    // $mileage = htmlspecialchars($_POST['mileage']);
    if (isset($_POST['logout'])) {
        return header("Location: login.php");
    }
    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $make = htmlspecialchars($_POST['make']);
        $year = htmlspecialchars($_POST['year']);
        $mileage = htmlspecialchars($_POST['mileage']);
        if (strlen($make) == 0) {
            $errors[] = 'Make is required';
            error_log('make field required');
        }
        if (!is_numeric($year) || !is_numeric($mileage)) {
            $errors[] = ' Mileage and year must be numeric';
            error_log('Mileage and year must be numeric');
        }
        if (count($errors) == 0) {
            $sql = "INSERT INTO misc.autos (make,year,mileage) values ('$make',$year,$mileage)";

            $conn->exec($sql);
            $message = 'Record inserted';
        }
    }


?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
        dc5d86e5
        </title>
    </head>

    <body>
        <h3>Tracking Autos For</h3>
        <h4><?php echo $_GET['name']; ?></h4>
        <p style='color:green;'>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <p style='color:red'>
            <?php
            if (isset($errors)) {
                foreach ($errors as $value) {
                    echo $value . '<br>';
                }
            }
            ?></p>
        <form action="" method="POST">
            make:<br>
            <input type="text" id="fname" name="make"><br>
            year:<br>
            <input type="text" id="lname" name="year"><br><br>
            mileage<br>
            <input type="text" name="mileage"><br><br>
            <button type="submit" value="Add" name="add">Add</button>
            <button type="submit" value="logout" name="logout">logout</button>

        </form>
        <h2>Automobiles</h2>
        <ul>
            <?php
            $stmt = $conn->query('select * from misc.autos');

            while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li>' . $rows['year']  . ' ' . $rows["make"]   . ' / ' . $rows['mileage'] .  '</li>';
            }
            ?>
        </ul>
    </body>

    </html>
<?php
} else {
    echo die("name paramter missing");
}
?>