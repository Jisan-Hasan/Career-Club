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
    <title> Job post view </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/stylesheet.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
 
</head>
<body class="w3-pale-yellow">
 
<!--Start Nav Bar -->
<?php 
    include 'admin_navbar.php';
    
    $sql= "SELECT jobpost.id,jobpost.companyname,jobpost.title,jobpost.deadline, jobpost.location,jobpost.education,
          jobpost.type,jobpost.requirement,jobpost.experience,jobpost.salary,jobpost.status ,category.name
          FROM jobpost INNER JOIN category ON jobpost.categoryid = category.id ";
    $result=mysqli_query($connection,$sql);
    //$row=mysqli_fetch_assoc($result);
?>
<!--End Nav Bar -->

<br>
<div class="w3-container">
    <h3 style="text-align: center">My Job Post View</h3>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered">
      <tr class="w3-green">
        <th>Company Name</th>
        <th>Title</th>
        <th>Category</th>
        <th>Location</th>
        <th>Type</th>
        <th>Requirement</th>
        <th>Education</th>
        <th>Experience</th>
        <th>Salary</th>
        <th>Deadline</th>
        <th>Action</th>
        
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { 
      ?>
      <tr class=" w3-light-blue w3-hover-blue-gray">
      <td> <?php echo $row['companyname'] ?></td>
        <td> <?php echo $row['title'] ?></td>
        <td> <?php echo $row['name'] ?></td>
        <td> <?php echo $row['location'] ?></td>
        <td> <?php echo $row['type'] ?></td>
        <td> <?php echo $row['requirement'] ?></td>
        <td> <?php echo $row['education'] ?></td>
        <td> <?php echo $row['experience'] ?></td>
        <td> <?php echo $row['salary'] ?>k</td>
        <td> <?php echo $row['deadline'] ?></td>
        <?php 
        if($row['status'] =='pending'){
        ?>
        <td>
          <a class="btn btn-info" href="admin_jobviewprocess.php?jobpostid=<?php echo $row['id']; ?>& approve=approved ">Approve</a>
          <a class="btn btn-danger" href="admin_jobviewprocess.php?jobpostid=<?php echo $row['id']; ?>& reject=rejected ">Reject</a>
        </td>
      
        <?php }else
        { ?>
        <td> <?php echo $row['status'] ?></td>
        <?php }
      }
      ?>
      </tr>
    </table>
  </div>

  <?php

    if(isset($_GET['approve_msg'])){
        echo $_GET['approve_msg'];
    }
    elseif(isset($_GET['reject_msg'])){
        echo $_GET['reject_msg'];
    }
        
  ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>