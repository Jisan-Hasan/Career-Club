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


    <br>
  <div class="container">
   
    <br>
    <table style="width:60%; margin-left: 200px" class=" w3-table-all w3-card-4  w3-large w3-centered ">
      <tr class="w3-green w3-padding-large">
        
        <th>Check Jobs Application</th>
        
        
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { 
        $title=$row['title'];
      ?>
      <tr class="w3-light-blue w3-hover-blue-gray">
        <td class="w3-padding-large"><a href="employer_viewapplicationprocess.php?jobtitle=<?=$title?>"> <?php echo $title; ?></a></td>
        </tr>
        <?php 
            
         }
        ?>

       </table>
  </div>


       

<?php
if(isset($_GET['reject_msg'])){
  echo $_GET['reject_msg'];
}
?>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

