<?php
session_start();
require '../database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>

<body class="w3-pale-yellow">

    <?php
    include 'admin_navbar.php';
    ?>

    <br><br>
    <div style="width: 60%" class="container w3-panel w3-card-4 w3-green ">

        <h2> Add Package</h2>
        <hr>
        <form action="add_package.php" method="POST">

            <div class="form-group">

                <input required type="text" class="form-control" name="package_name" placeholder="Name">
            </div>
            <div class="form-group">
                <input required type="text" class="form-control" name="numberof_post" placeholder="No. of Post">
            </div>

            <div class="form-group">
                <input required type="text" class="form-control" name="package_price" placeholder="Price">
            </div>
            <button class="w3-margin-bottom btn btn-info" name="submit" type="submit" class="btn btn-default"> Submit </button><br>
        </form>

    </div>
    </div>
    </div>

    <?php
    // package store into database

    if (isset($_POST['submit'])) {

        $name = $_POST['package_name'];
        $numberofpost = $_POST['numberof_post'];
        $price = $_POST['package_price'];
        $adminid = $_SESSION['admin_id'];
        $package_sql = "INSERT INTO package (name,numberofpost,price,adminid) VALUES ('$name','$numberofpost','$price','$adminid')";
        if (mysqli_query($connection, $package_sql)) {
            // header("Location: view_categories.php?package_add_success= package Successfully added." );
            // exit;
            echo "Package successfully added";
        } else {
            header("Location: add_package.php?package_add_failed= Failed to add the package");
            exit;
            // echo $connection->error;
        }
    }
    if (isset($_GET['package_add_failed'])) {
        echo $_GET['package_add_failed'];
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>