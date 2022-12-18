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
    <title>Employer List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">

<?php 
  // NavBar
    include 'admin_navbar.php';
    
    $sql= "SELECT * FROM employer";
    $result= mysqli_query($connection, $sql);
?>

<br>
     <div class="container">
    <h4 style="text-align: center">Employer List</h4>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered">
      <tr class="w3-green">
        <th>Name</th>
        <th>Company Name</th>
        <th>Location</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { ?>
       <tr  class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['name'] ?></td>
        <td> <?php echo $row['companyname'] ?></td>
        <td> <?php echo $row['location'] ?></td>
        <td> <?php echo $row['email'] ?></td>
        <td> <?php echo $row['mobile'] ?></td>
        <?php if($row['status']=='active'){?>
        <td>
          <a class="btn btn-warning" href="admin_employerlistprocess.php?employerid=<?php echo $row['id']; ?>&active=active">Active</a>
        </td>
        <?php } elseif($row['status']=='deactivate'){?>
          <td>
          <a class="btn btn-warning" href="admin_employerlistprocess.php?employerid=<?php echo $row['id']; ?>&deactivate=deactivate">Deactive</a>
        </td>
      </tr>
      <?php 
        }
      }
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
elseif(isset($_GET['status_msg'])){
  echo $_GET['status_msg'];
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>