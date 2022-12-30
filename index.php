<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
</head>

<body class="images">
 
<!--Start Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">CareerClub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        
      <!--Contact Us-->
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>

      <!--User-->
      <li class="nav-item">
        <a class="nav-link" href="user/user_login.php">User</a>
      </li>

      <!--Employee-->
      <li class="nav-item">
        <a class="nav-link" href="employer/index.php">Employer</a>
      </li>
      
    </ul>
  </div>
</nav>

<!--End Nav Bar -->

<!--Start Banner image -->

<div >
    <h2 class="user1">Search for Jobs</h2>
    <form action="job_search.php" method="post">
      <input class="input1" type="text" name="keyword" placeholder="Search By Keyword">
      <input class="input2" type="text" name="location" placeholder="Search By Location">
      <button Type="submit" name="search" class ="btn btn-info">Submit</button>
      
    </form> 

  <div class="column" >
    <h2>Categories</h2>
    <?php 
      $categorysql="SELECT * from category";
      $categorysqlresult = mysqli_query($connection,$categorysql);
      while($category_row = mysqli_fetch_assoc($categorysqlresult)){
    ?>
    <p><a class="link" href="job_search.php?categoryid=<?=$category_row['id']?>&categorysearch=category">&#8594 <?=$category_row['name']?></a></p>
    <?php }?>
  </div>
  <div class="column" >
    <h2>Quick Links</h2>
    <p><a class="link" href="job_search.php?deadline=next24hours">&#8594 Deadline Next 24 Hours</a></p>
    <p><a class="link" href="job_search.php?parttime=Part Time"> &#8594 Part Time Jobs</a></p>
    <p><a class="link" href="job_search.php?workformhome=Work From Home">&#8594 Work From Home</a></p>
  </div>
  </div>
</div>

<!--end Banner image -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</body>
</html>