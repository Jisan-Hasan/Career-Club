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
    <title>User Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="images">

 
<!--Start Nav Bar -->
<?php 
  include 'user_navbar.php';
?>
<!--End Nav Bar -->
  <div>
    <h2 class="user1">Search for Jobs</h2>
    <form action="user_search.php" method="POST">
      <input class="input1" type="text" name="keyword" placeholder="Search By Keyword">
      <input  class="input2" type="text" name="location" placeholder="Search By Location">
      <button Type="submit" name="search" class ="btn btn-info">Submit</button>
    </form> 
    
    
   
  <div class="column" >
    <h2>Categories</h2>
    <?php 
      $categorysql="SELECT * from category";
      $categorysqlresult = mysqli_query($connection,$categorysql);
      while($category_row = mysqli_fetch_assoc($categorysqlresult)){
    ?>
    <p><a class="link" href="user_search.php?categoryid=<?=$category_row['id']?>&categorysearch=category">&#8594 <?=$category_row['name']?></a></p>
    <?php }?>
  </div>
  <div class="column" >
    <h2>Quick Links</h2>
    <p><a class="link" href="user_search.php?deadline=next24hours"> &#8594 Deadline next 24 Hours</a></p>
    <p><a class="link" href="user_search.php?parttime=Part Time"> &#8594 Part Time Jobs</a></p>
    <p><a class="link" href="user_search.php?workformhome=Work From Home">&#8594 Work From Home</a></p>
  </div>
  
</div>




<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>