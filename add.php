<?php
session_start();
if (!isset($_SESSION['name'])) {
    die('Not logged in');
}
if (isset($_SESSION["name"])) {

    if (isset($_POST["cancel"])) {
        header("Location: view.php");
        return;
    }
    if (isset($_POST["add"])) {
        $_SESSION['errors'] = array();
        //  $make = htmlspecialchars($_POST['make']);
        $make = htmlentities($_POST['make']);
        $year = htmlentities($_POST['year']);
        $mileage = htmlentities($_POST['mileage']);
        if (strlen($make) == 0) {
            $_SESSION['errors'][] = 'Make is required';
            error_log('make field required');
        }
        if (!is_numeric($year) || !is_numeric($mileage)) {
            $_SESSION['errors'][] = ' Mileage and year must be numeric';
            error_log('Mileage and year must be numeric');
        }
        if (count($_SESSION['errors']) == 0) {
            require_once "pdo.php";
            $sql = "INSERT INTO misc.autos (make,year,mileage) values ('$make',$year,$mileage)";
            $conn->exec($sql);
            $_SESSION["success"] = "Record inserted";

            header("Location: view.php");
            return;
        } else {
            header("Location: add.php");
            return;
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>dc5d86e5</title>
    </head>

    <body>
        <h3>Tracking Autos For <?php echo $_SESSION['name']; ?></h3>

        <p style='color:green;'>

        </p>
        <p style='color:red'>
            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $value) {
                    echo htmlentities($value) . '<br>';
                }
                unset($_SESSION['errors']);
            }
            ?>
        </p>
        <form action="" method="POST">
            make:<br>
            <input type="text" id="fname" name="make"><br>
            year:<br>
            <input type="text" id="lname" name="year"><br><br>
            mileage<br>
            <input type="text" name="mileage"><br><br>
            <button type="submit" value="Add" name="add">Add</button>
            <button type="submit" value="cancel" name="cancel">cancel</button>

        </form>
    </body>

    </html>
<?php
} //  else {
//     die('Not logged in');
// }

?>