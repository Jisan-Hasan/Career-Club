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

    $sql = "SELECT buypackage.amount,employer.companyname FROM buypackage 
    INNER JOIN employer ON buypackage.employerid=employer.id";
    $result = mysqli_query($connection, $sql);
    ?>

    <div class="w3-container">
        <h3 style="text-align: center">Employer Payment</h3>
        <br>
        <table class="w3-table-all w3-card-4 w3-centered">
            <tr class="w3-green">
                <th>Company Name</th>
                <th>Amount</th>

            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr class=" w3-light-blue w3-hover-blue-gray">
                    <td> <?php echo $row['companyname'] ?></td>
                    <td> <?php echo $row['amount'] ?></td>
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