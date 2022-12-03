<?php
require '../database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>

<body class="w3-pale-yellow">

    <!--Start Nav Bar -->
    <?php

    include 'admin_navbar.php';
    $employersql = "SELECT * from employer";
    $employersqlresult = mysqli_query($connection, $employersql);
    $employernumbers = mysqli_num_rows($employersqlresult);

    $usersql = "SELECT * from user";
    $usersqlresult = mysqli_query($connection, $usersql);
    $usernumbers = mysqli_num_rows($usersqlresult);

    $jobpostsql = "SELECT * from jobpost";
    $jobpostsqlresult = mysqli_query($connection, $jobpostsql);
    $jobpostnumber = mysqli_num_rows($jobpostsqlresult);

    $jobapplysql = "SELECT * from jobapply";
    $jobapplysqlresult = mysqli_query($connection, $jobapplysql);
    $jobapplynumber = mysqli_num_rows($jobapplysqlresult);

    $paymentsql = "SELECT SUM(amount) AS total FROM payment";
    $paymentsqlresult = mysqli_query($connection, $paymentsql);
    $payment = mysqli_fetch_assoc($paymentsqlresult);
    ?>
    <!--End Nav Bar -->

    <br>
    <h3 class="w3-center">Admin Dashboard</h3>
    <br>
    <div class="row">
        <div class="column w3-center" style="background-color:#FF8C69; ">
            <h2>Total Employers</h2>
            <h4><?php echo $employernumbers ?></h4>
        </div>
        <div class="column w3-center" style="background-color:#836FFF; ">
            <h2>Total Users</h2>
            <h4><?php echo $usernumbers ?></h4>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="column w3-center" style="background-color:#00FFFF; ">
            <h2>Total Job Post</h2>
            <h4><?php echo $jobpostnumber ?></h4>
        </div>
        <div class="column w3-center" style="background-color:#00FF7F; ">
            <h2>Total Job Apply</h2>
            <h4><?php echo $jobapplynumber ?></h4>
        </div>
    </div>
    <br><br>
    <div style="margin: 0px 0px 0px 400px">
        <div class="column w3-center" style="background-color:#B771EF ">
            <h2>Total Payment</h2>
            <?php
            if ($payment['total'] == NULL) {
                echo "0.00";
            } else { ?>
                <h4><?php echo $payment['total'];
                } ?></h4>

        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>