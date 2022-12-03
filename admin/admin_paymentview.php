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
    <title> View Package </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">

</head>

<body class="w3-pale-yellow">

    <?php

    // NavBar
    include 'admin_navbar.php';

    $viewsql = "SELECT package.name,package.numberofpost,package.price,payment.transid,payment.cardtype,payment.transtime, 
      employer.companyname, employer.email,employer.location FROM payment
      INNER JOIN employer ON employer.id =payment.employerid
      INNER JOIN package on package.id=payment.packageid";
    $viewsqlresult = mysqli_query($connection, $viewsql);
    ?>

    <div class="w3-container">
        <h3 style="text-align: center">Payment View</h3>
        <br>
        <table class="w3-table-all w3-card-4 w3-centered">
            <tr class="w3-green">
                <th>Company Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Name</th>
                <th>No. of Post</th>
                <th>Price</th>
                <th>Transaction Id</th>
                <th>Card type</th>
                <th>Time</th>

            </tr>
            <?php while ($view_row = mysqli_fetch_assoc($viewsqlresult)) { ?>
                <tr class=" w3-light-blue w3-hover-blue-gray">
                    <td> <?php echo $view_row['companyname'] ?></td>
                    <td> <?php echo $view_row['email'] ?></td>
                    <td> <?php echo $view_row['location'] ?></td>
                    <td> <?php echo $view_row['name'] ?></td>
                    <td> <?php echo $view_row['numberofpost'] ?></td>
                    <td> <?php echo $view_row['price'] ?></td>

                    <td> <?php echo $view_row['transid'] ?></td>
                    <td> <?php echo $view_row['cardtype'] ?></td>
                    <td> <?php echo $view_row['transtime'] ?></td>
                </tr>
            <?php }
            ?>
        </table>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>