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
<body class="w3-pale-yellow">

<?php
// navbar
    include 'employer_navbar.php';

    $employerid=$_SESSION['employerid'];

    $sql="Select title from jobpost where employerid='$employerid' ";
    $result=mysqli_query($connection,$sql);
    $i=1;
    

?>
<!-- 
<br><br>
<div class="container  ">
    <h2 class="w3-center w3-green ">Job Lists</h2>
      <?php //while ($row = mysqli_fetch_assoc($result))
    {
       // $title=$row['title'];
      ?>
    <ul class="w3-ul w3-card-4 w3-pale-green w3-border w3-large">
  <li class="w3-display-container w3-panel w3-hover-gray"><span class="w3-badge"><?= $i++ ?></span><a href="employer_viewjobapplication.php?jobtitle=<?=$title?>"> <?php echo $title; ?></a></li>

    <?php
     }
     ?>  
     
  </div> -->

    <br>
  <div class="container ">
   
    <br>
    <table style="width:60%; margin-left: 200px" class="w3-table-all w3-card-4 w3-centered w3-large">
      <tr class="w3-green w3-padding-large">
        
        <th>Check Interviewee List</th>
        
        
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { 
        $title=$row['title'];
      ?>
      <tr class="w3-light-blue w3-hover-blue-gray">
        <td class="w3-padding-large"><a href="employer_interviewlistprocess.php?jobtitle=<?=$title?>"> <?php echo $title; ?></a></td>
        </tr>
        <?php 
            
         }
        ?>

       </table>
  </div>


       




<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

