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
   <link rel="stylesheet" href="../css/w3.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   
 
</head>
<body class="w3-pale-yellow">
<!--Start Nav Bar -->
<?php 
 include 'employer_navbar.php';
?>
<!--End Nav Bar -->

<?php
    $employerid=$_SESSION['employerid'];
    if( isset($_SESSION['employerid']) && isset($_GET['jobtitle'])){
      $employerid=$_SESSION['employerid'];
      $jobtitle=$_GET['jobtitle'];
      $sql="SELECT interview.meetingid,interview.time,interview.url,interview.password,user.name As username,jobpost.title,jobpost.type
      FROM interview
      INNER JOIN user ON interview.userid=user.id
      INNER JOIN jobpost ON interview.jobpostid=jobpost.id
      WHERE interview.employerid='$employerid' AND jobpost.title='$jobtitle'";

      $result=mysqli_query($connection,$sql);
    }

    

?>
<br><br>
<div class="w3-container">
    <h3 class="w3-center">Interviewee List</h3>
    <br>
    <table class="w3-table-all w3-card-4 w3-hoverable w3-large">
      <tr class="w3-green">
        
        <th>Applicant Name</th>
        <th>Job Name</th>
        <th>Type</th>
        <th>Meeting ID</th>
        <th>Meeting Password</th>
        <th>Meeting Time</th>
        <th>Meeting Link</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { 
      ?>
      <tr class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['username'] ?></td>
        <td> <?php echo $row['title'] ?></td>
        <td> <?php echo $row['type'] ?></td>
        <td> <?php echo $row['meetingid'] ?></td>
        <td> <?php echo $row['password'] ?></td>
        <td> <?php echo $row['time'] ?></td>
        <td> <a class ="btn btn-warning" href="<?php echo $row['url'] ?>" target="_blank" >Join url</a></td>
        
        
        
      </tr>
      <?php 
      }
      ?>
    </table>
  </div>

<?php
    if(isset($_GET['interview_msg'])){
        echo $_GET['interview_msg'];
    }
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>