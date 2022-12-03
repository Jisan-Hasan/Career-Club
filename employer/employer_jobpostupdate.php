<?php
session_start();
require '../database.php';

if(isset($_POST['jobpost_update'])){
    $jobid=$_POST['job_id'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $requirement = $_POST['requirement'];
    $experience = $_POST['experience'];
    $salary = $_POST['salary'];
    $deadline=$_POST['deadline'];
    $education=$_POST['education'];

    $updatesql="UPDATE jobpost SET location='$location' , type='$type', requirement='$requirement', 
                experience='$experience', salary='$salary', editlimit='0', status='pending', 
                education='$education ',deadline='$deadline' where id='$jobid' ";
    if(mysqli_query($connection,$updatesql)){
        header("Location: employer_jobview.php?update_success=Job post successfully updated. Waiting for admin approval");
        exit();
    }else{
        header("Location: employer_jobview.php?update_failed=Job post successfully Failed");
        exit();
    }
}



?>
