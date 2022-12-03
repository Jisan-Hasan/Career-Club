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
    include 'employer_navbar.php';
    $employerid=$_SESSION['employerid'];
   
    $viewsql="SELECT package.name,package.numberofpost,package.price,payment.transid,payment.cardtype,payment.transtime FROM payment
    INNER JOIN employer ON employer.id =payment.employerid
    INNER JOIN package on package.id=payment.packageid
    WHERE payment.employerid='$employerid'";
    $viewsqlresult=mysqli_query($connection,$viewsql);

    
    $countsql="SELECT * from buypackage  WHERE employerid='$employerid'";
    $countsqlresult=mysqli_query($connection,$countsql);
    
    
?>

<br>
     <div class="container">
    <h4 style="text-align: center">My Package</h4>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered ">
      <tr class="w3-green">
        <th>Name</th>
        <th>No. of Post</th>
        <th>Price</th>
        <th>Transaction Id</th>
        <th>Card type</th>
        <th>Time</th>
        
      </tr>
      <?php while ($view_row=mysqli_fetch_assoc($viewsqlresult))
      { ?>
      <tr class="w3-light-blue w3-hover-blue-gray">
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
  </div>

  <br>
  <div class="container">
    <h4 class="w3-center">My Post Limit</h4>
    <br>
    <table  class="w3-table-all w3-card-4 ">
      <tr class="w3-green">
        
        <th>Total Post Remain</th>
        <th>Total Paid</th>
        
      </tr>
      <?php while ($count_row=mysqli_fetch_assoc($countsqlresult))
      { ?>
      <tr class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $count_row['numberofpost'] ?></td>
        <td> <?php echo $count_row['amount'] ?></td>
      </tr>
      <?php }
      ?>
    </table>
  </div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>