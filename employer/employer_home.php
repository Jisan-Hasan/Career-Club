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
    <title> Employer home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<!--Start Nav Bar -->
<?php 
 include 'employer_navbar.php';
?>
<!--End Nav Bar -->
<body class="w3-pale-yellow">
 
<!--Start Nav Bar -->
<?php 
$employerid=$_SESSION['employerid'];

$jobpostsql="SELECT * FROM jobpost where employerid='$employerid'";
$jobpostsqlresult=mysqli_query($connection,$jobpostsql);
$total_jobpost=mysqli_num_rows($jobpostsqlresult);


$applysql="SELECT jobapply.jobid,jobpost.companyname FROM jobapply INNER JOIN jobpost ON jobapply.jobid = jobpost.id 
    WHERE jobapply.jobid in ( SELECT id FROM jobpost WHERE employerid='$employerid') ";
$applysqlresult=mysqli_query($connection,$applysql);
$total_apply=mysqli_num_rows($applysqlresult);

$interviewsql="SELECT interview.jobpostid,jobpost.companyname FROM interview INNER JOIN jobpost ON interview.jobpostid = jobpost.id 
    WHERE interview.jobpostid in ( SELECT id FROM jobpost WHERE employerid='$employerid') ";
$interviewsqlresult=mysqli_query($connection,$interviewsql);
$total_interview=mysqli_num_rows($interviewsqlresult);

$paymentsql="SELECT * from buypackage where employerid='$employerid' ";
$paymentsqlresult=mysqli_query($connection,$paymentsql);
$payment_row_num=mysqli_num_rows($paymentsqlresult);
$payment_row=mysqli_fetch_assoc($paymentsqlresult);


?>
<!--End Nav Bar -->

  <br>
  <h3 class="w3-center">Employer Dashboard</h3>
  <br>
  <div class="row">
    <div class="column w3-center" style="background-color:#FF8C69; ">
      <h2>Total Job post</h2>
      <h4><?php echo $total_jobpost ?></h4>
    </div>
    <div class="column w3-center" style="background-color:#836FFF; ">
      <h2>Total Application</h2>
      <h4><?php echo $total_apply ?></h4>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="column w3-center" style="background-color:#00FFFF; ">
      <h2>Total interviewee</h2>
      <h4><?php echo $total_interview ?></h4>
    </div>
    <div class="column w3-center" style="background-color:#00FF7F; ">
      <h2>Total Payment</h2>
      <?php if($payment_row_num==0){
        echo "0.00";
      }else{
      ?>
      <h4><?php echo $payment_row['amount']; ?></h4>
      <?php
      }?>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>