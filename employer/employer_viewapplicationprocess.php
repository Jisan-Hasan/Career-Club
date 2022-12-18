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
    <title> User Applied Job View </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class=" w3-pale-yellow">

<?php
// navbar
    include 'employer_navbar.php';
?>
<?php

    if( isset($_SESSION['employerid']) && isset($_GET['jobtitle'])){
        $employerid=$_SESSION['employerid'];
        $jobtitle=$_GET['jobtitle'];

        $viewsql="SELECT jobapply.id AS applyid,jobapply.jobid AS jobid,jobapply.userid AS userid,jobapply.status,jobpost.employerid,user.name AS username,
        user.email AS useremail,jobpost.title,jobpost.type,jobpost.requirement,jobpost.salary,jobapply.cv,jobapply.applytime FROM jobapply
        INNER JOIN jobpost ON jobapply.jobid = jobpost.id
        INNER JOIN category ON jobapply.categoryid=category.id
        INNER JOIN user ON jobapply.userid=user.id
        WHERE jobapply.jobid in ( SELECT id FROM jobpost WHERE employerid='$employerid') AND jobpost.title='$jobtitle' ";
        $viewsqlresult=mysqli_query($connection,$viewsql);
    }
?>
<br>
<div class="w3-container">
    <h4 class="w3-center">Job Application View</h4>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered">
      <tr class="w3-green">
        
        <th>User Name</th>
        <th>User Email</th>
        <th>Title</th>
        <th>Type</th>
        <th>Requirement</th>
        <th>Salary</th>
        <th>CV</th>
        <th>Apply Date</th>
        <th>CV</th>
        <th>Action</th>
        
      </tr>
      <?php while ($row = mysqli_fetch_assoc($viewsqlresult))
      { 
        // btn btn-outline-success
        // btn btn-outline-danger
        $applyid=$row['applyid'];
        $jobid=$row['jobid'];
        $userid=$row['userid'];
        $status=$row['status'];
      ?>
      <tr class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['username'] ?></td>
        <td> <?php echo $row['useremail'] ?></td>
        <td> <?php echo $row['title'] ?></td>
        <td> <?php echo $row['type'] ?></td>
        <td> <?php echo $row['requirement'] ?></td>
        <td> <?php echo $row['salary'] ?>k</td>
        <td> <?php echo $row['cv'] ?></td>
        <td> <?php echo $row['applytime'] ?></td>
        <td>
            <a class="btn btn-info" target="_blank" href="employer_cv.php?applyid=<?php echo $applyid ?>&view=view ">View</a>
            <a class="btn btn-warning" href="employer_cv.php?applyid=<?php echo $applyid ?>&download=download">Download</a> 
        </td>
        <?php   if($status=='applied'){ ?>
        <td>
            <a class="btn btn-info" href="employer_interview.php?accept=accept&jobid=<?php echo $jobid ?>&userid=<?php echo $userid ?>&applyid=<?php echo $applyid ?>&employerid=<?php echo $employerid ?>">Interview</a><br>
            <a class="btn btn-danger" href="employer_interview.php?reject=reject&jobid=<?php echo $jobid ?>&userid=<?php echo $userid ?>&applyid=<?php echo $applyid ?>&employerid=<?php echo $employerid ?>">Reject</a>
        </td>

        <?php }else{ ?>
        <td> <?php echo $row['status'] ?></td>
        </tr>
        <?php 
            }
         }
        ?>

       </table>
  </div>

  
<?php
    if(isset($_GET['apply_msg'])){
        echo $_GET['apply_msg'];
    }
    elseif(isset($_GET['cv_msg'])){
        echo $_GET['cv_msg'];
    }
    elseif(isset($_GET['reject_msg'])){
        echo $_GET['reject_msg'];
    }
    elseif(isset($_GET['interview_msg'])){
        echo $_GET['interview_msg'];
    }
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

