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
    <title> Interview Time </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">
 
<!--Start Nav Bar -->
<?php 
 include 'employer_navbar.php';
?>
<!--End Nav Bar -->
<?php
    if(isset($_GET['reject']) && isset($_GET['jobid']) && isset($_GET['userid']) && isset($_GET['applyid']) && isset($_GET['employerid']) ){

        $applyid=$_GET['applyid'];
        $sql="UPDATE jobapply set status='rejected' where id='$applyid'";
        if(mysqli_query($connection,$sql)){
            header("Location: employer_viewapplication.php?reject_msg=Application is rejected ");
            exit();
           
        }else{
           echo $connection->error;
        }
    }
    if(isset($_GET['accept']) && isset($_GET['jobid']) && isset($_GET['userid']) && isset($_GET['applyid']) && isset($_GET['employerid']) ){
        
        $jobpostid=$_GET['jobid'];
        $jobapplyid=$_GET['applyid'];
        $userid=$_GET['userid'];
        $employerid=$_GET['employerid'];
    
?>


    <br><br><br>
    <div class="container w3-light-blue ">
        <div class="row">
           <div class="col-md-8 col-md-offset-3">
            <h2 class="w3-greeen w3-padding-small" style="width: 60%">Interview Time Set</h2>
            <hr>
            <form action="employer_interviewprocess.php" method="post">
                <input required type="hidden" class="form-control" name="jobpostid" value="<?=$jobpostid?>">
                <input required type="hidden" class="form-control" name="jobapplyid" value="<?=$jobapplyid?>">
                <input required type="hidden" class="form-control" name="userid" value="<?=$userid?>">
                <input required type="hidden" class="form-control" name="employerid" value="<?=$employerid?>">

                <div class="form-group">
                    <!-- <label for="Interview ">Interview: </label> -->
                    <input required class="form-control" type="datetime-local" name="interviewcall" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">     
                </div> 
                <button Type="submit" name="interview"class ="btn btn-info">Submit</button>
                <br><br>
            </form>
           </div>
        </div>
   </div>

   <?php
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>