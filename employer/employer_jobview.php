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
 
<!--Start Nav Bar -->
<?php 
     include 'employer_navbar.php';
     
    $employerid=$_SESSION['employerid'];

    $sql= "SELECT jobpost.id,jobpost.title,jobpost.deadline,jobpost.education, jobpost.location,jobpost.type,jobpost.requirement,jobpost.experience,jobpost.salary,jobpost.status,jobpost.editlimit,category.name
            FROM jobpost INNER JOIN category ON jobpost.categoryid = category.id WHERE employerid='$employerid' ";
    $result=mysqli_query($connection,$sql);
    //$row=mysqli_fetch_assoc($result);
?>
<!--End Nav Bar -->

<br><br>
<div class="w3-container">
    <h3 class="w3-center">View Categories</h3>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered">
      <tr class="w3-green">
        
        <th>Title</th>
        <th>Category</th>
        <th>Location</th>
        <th>Type</th>
        <th>Requirement</th>
        <th>Education</th>
        <th>Experience</th>
        <th>Salary</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { 
      ?>
      <tr class="w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['title'] ?></td>
        <td> <?php echo $row['name'] ?></td>
        <td> <?php echo $row['location'] ?></td>
        <td> <?php echo $row['type'] ?></td>
        <td> <?php echo $row['requirement'] ?></td>
        <td> <?php echo $row['education'] ?></td>
        <td> <?php echo $row['experience'] ?></td>
        <td> <?php echo $row['salary'] ?>k</td>
        <td> <?php echo $row['deadline'] ?></td>
        <td> <?php echo $row['status'] ?></td>
        <?php if($row['editlimit']>0){ ?>
        <td>
          <a class="btn btn-warning" href="employer_jobpostedit.php?jobpostid=<?php echo $row['id']; ?>& edit=edit">Edit</a>
        </td>
        <?php }else{ ?>
          <td> Already Edited</td>
      </tr>
      <?php 
        }
      }
      ?>
    </table>
  </div>

  <?php
        if(isset($_GET['jobpost_success'])){
            echo $_GET['jobpost_success'];
        }
        elseif(isset($_GET['update_success'])){
          echo $_GET['update_success'];
        }
        elseif(isset($_GET['update_failed'])){
          echo $_GET['update_failed'];
        }
  ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>