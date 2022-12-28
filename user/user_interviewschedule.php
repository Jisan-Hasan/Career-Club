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
    <title>Interview Schedule</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">

<?php
// navbar
    include 'user_navbar.php';

    $userid=$_SESSION['userid'];

    $viewsql="SELECT jobpost.title,jobpost.companyname,jobpost.type,jobpost.requirement,jobpost.salary,
    interview.meetingid,interview.time,interview.url,interview.password FROM interview
    INNER JOIN jobpost ON interview.jobpostid=jobpost.id
    WHERE interview.userid='$userid' ";
    $viewsqlresult=mysqli_query($connection,$viewsql);

?>

<br><br>
<div class="w3-container">
    <h4 class="w3-center">My Job Post View</h4>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered">
      <tr class="w3-green">
        
        <th>Job Name</th>
        <th>Company Name</th>
        <th>Type</th>
        <th>Requirement</th>
        <th>Salary</th>
        <th>Meeting ID</th>
        <th>Password</th>
        <th>Meeting Time</th>
        <th>Meeting Link</th>
        
      </tr>
      <?php while ($row = mysqli_fetch_assoc($viewsqlresult))
      { 
      ?>
      <tr class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['title'] ?></td>
        <td> <?php echo $row['companyname'] ?></td>
        <td> <?php echo $row['type'] ?></td>
        <td> <?php echo $row['requirement'] ?></td>
        <td> <?php echo $row['salary'] ?>k</td>
        <td> <?php echo $row['meetingid'] ?></td>
        <td> <?php echo $row['password'] ?></td>
        <td> <?php echo $row['time'] ?></td>
        <td> <a class ="btn btn-warning" href="<?php echo $row['url'] ?>" target="_blank">Join Url</a></td>
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

