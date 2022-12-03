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
    <title> Buy Package </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">
<?php 
  // NavBar
    include 'employer_navbar.php';
    
    if(isset($_GET['employerid'])){

      $employerid=$_GET['employerid'];

      $sql="SELECT * from employer where id='$employerid' ";
      $sqlresult=mysqli_query($connection,$sql);
      $employer_row=mysqli_fetch_assoc($sqlresult);
      if($employer_row){
        $_SESSION['employerid']=$employer_row['id'];
        $_SESSION['name'] = $employer_row['name'];
        $_SESSION['companyame'] = $employer_row['companyname'];
        $_SESSION['location'] = $employer_row['location'];
        $_SESSION['email'] = $employer_row['email'];
        $_SESSION['mobile'] = $employer_row['mobile'];
        $_SESSION['position'] = $employer_row['position'];
      }
    }
    $sql= "SELECT * FROM package";
    $result= mysqli_query($connection, $sql);
?>

<br>
     <div class="container">
    <h4 style="text-align: center">Buy Package</h4>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered w3-large">
      <tr class="w3-green">
        
        <th>Name</th>
        <th>No. of Post</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { ?>
      <tr class="w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['name'] ?></td>
        <td> <?php echo $row['numberofpost'] ?></td>
        <td> <?php echo $row['price'] ?></td>
        
        <td>
          <a class="btn btn-warning" href="payment_checkout.php?packageprice= <?php echo $row['price']; ?>&packagename=<?php echo $row['name']; ?> &packageid=<?php echo $row['id']; ?>&numberofpost=<?php echo $row['numberofpost']; ?>">Buy</a>
        </td>
      </tr>
      <?php }
      ?>
    </table>
  </div>

<?php

if(isset($_GET['success_msg'])){
    echo $_GET['success_msg'];
}
elseif(isset($_GET['fail_msg'])){
    echo $_GET['fail_msg'];
}
elseif(isset($_GET['cancel_msg'])){
    echo $_GET['cancel_msg'];
}
elseif(isset($_GET['package_buy'])){
  echo $_GET['package_buy'];
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>