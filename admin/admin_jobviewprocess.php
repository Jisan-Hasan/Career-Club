<?php
session_start();
require '../database.php';


    if(isset($_GET['jobpostid']) && isset($_GET['approve'])){
        $jobid=$_GET['jobpostid'];
        
        $approvesql="UPDATE jobpost set status='approved' where id='$jobid' ";
        if($approvesqlresult=mysqli_query($connection,$approvesql)){
            header("Location: admin_jobview.php?approve_msg=Post is approved ");
            exit();
        }
        
    }

    if(isset($_GET['jobpostid']) && isset($_GET['reject'])){
        $jobid=$_GET['jobpostid'];
        
        $approvesql="UPDATE jobpost set status='rejected' where id='$jobid' ";
        if($approvesqlresult=mysqli_query($connection,$approvesql)){
            header("Location: admin_jobview.php?reject_msg=Post is rejected ");
            exit();
        }
        
    }
?>
