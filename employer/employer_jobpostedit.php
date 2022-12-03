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
    <title> Edit Job Post </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
 
</head>
<body class="w3-pale-yellow">
 
<!--Start Nav Bar -->
<?php 
     include 'employer_navbar.php';

    // End Nav Bar
    if(isset($_GET['jobpostid']) && isset($_GET['edit'])){
      $jobid=$_GET['jobpostid'];

      $sql= "SELECT * from jobpost WHERE id='$jobid' ";
      $result=mysqli_query($connection,$sql);
      $edit_row=mysqli_fetch_assoc($result);
      if($edit_row['editlimit']==1){
      
?>


<div class="container w3-card-4 w3-green ">
    
    <h4 style="text-align: center">My Job Post View</h4>
    <h2> Edit Job Post</h2>
     <hr>
      <form action="employer_jobpostupdate.php" method="POST">
        <div class="form-group">

            <input type = 'hidden' name = 'job_id' value = "<?php echo $edit_row['id']?>"  >

            <label for="Job Title"> Job Title : </label>
            <input readonly required type="text" class="form-control" name= "title" value= "<?php echo $edit_row['title']?>">
            <label for="Company Name"> Company Name : </label>
            <input readonly required type="text" class="form-control" name= "companyname" value= "<?php echo $edit_row['companyname']?>">
            <label for="Category Id"> Category Id : </label>
            <input readonly required type="text" class="form-control" name= "categoryid" value= "<?php echo $edit_row['categoryid']?> ">
            <label for="Location"> Location : </label>
            <input required type="text" class="form-control" name= "location" value= "<?php echo $edit_row['location']?> ">
            <label for="Job Type"> Job Type : </label>
            <input  required type="text" class="form-control" name= "type" value= "<?php echo $edit_row['type']?> ">
            <label for="Requirement"> Requirement : </label>
            <input required type="text" class="form-control" name= "requirement" value= "<?php echo $edit_row['requirement']?> ">
            <label for="Educational Requirement"> Educational Requirement : </label>
            <input required type="text" class="form-control" name= "education" value= "<?php echo $edit_row['education']?> ">
            <label for="Experience"> Experience : </label>
            <input required type="text" class="form-control" name= "experience" value= "<?php echo $edit_row['experience']?> ">
            <label for="Salary"> Salary : </label>
            <input required type="text" class="form-control" name= "salary" value= "<?php echo $edit_row['salary']?>k">
            <label for="Deadline"> Deadline : </label>
            <input required type="text" class="form-control" name= "deadline" value= "<?php echo $edit_row['deadline']?>">
        </div>
         <button type="submit" name= "jobpost_update"class="btn btn-info"> Update </button><br>
         </form>
  </div>
<br>
<?php
      }
    }
?>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>