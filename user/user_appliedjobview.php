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
    <title>Applied Jobs View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class=" w3-pale-yellow">

<?php
// navbar
    include 'user_navbar.php';

    $userid=$_SESSION['userid'];

    $viewsql="SELECT  jobapply.id,jobapply.applytime,jobapply.cv,jobapply.status,jobpost.experience,jobpost.requirement,jobpost.education,jobpost.title,category.name,jobpost.location,jobpost.type,jobpost.salary FROM jobapply
    INNER JOIN jobpost ON jobapply.jobid = jobpost.id
    INNER JOIN category ON jobapply.categoryid=category.id
    WHERE jobapply.userid='$userid' ";
    $viewsqlresult=mysqli_query($connection,$viewsql);

?>

<br><br>
<div class="w3-container">
    <h4 class="w3-center">My Job Post View</h4>
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
        <th>CV</th>
        <th>Apply Date</th>
        <th>Status</th>
        
      </tr>
      <?php while ($row = mysqli_fetch_assoc($viewsqlresult))
      { 
      ?>
      <tr class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['title'] ?></td>
        <td> <?php echo $row['name'] ?></td>
        <td> <?php echo $row['location'] ?></td>
        <td> <?php echo $row['type'] ?></td>
        <td> <?php echo $row['requirement'] ?></td>
        <td> <?php echo $row['education'] ?></td>
        <td> <?php echo $row['experience'] ?></td>
        <td> <?php echo $row['salary'] ?>k</td>
        <td> <?php echo $row['cv'] ?></td>
        <td> <?php echo $row['applytime'] ?></td>
        <td><?php echo $row['status'] ?></td>
      </tr>
      <?php 
         }
      ?>
       </table>
  </div>

  
<?php
    if(isset($_GET['apply_msg'])){
        echo $_GET['apply_msg'];
    }
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

