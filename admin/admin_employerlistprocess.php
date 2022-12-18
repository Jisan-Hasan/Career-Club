<?php
session_start();
require '../database.php';

if(isset($_GET['employerid']) && isset($_GET['active'])){
   
    $employerid=$_GET['employerid'];
    $sql="UPDATE employer set status='deactivate' ,bantime = DATE_ADD(NOW(), INTERVAL 7 DAY) where id='$employerid' ";
    if(mysqli_query($connection,$sql)){
        header("Location: admin_employerlist.php?status_msg=Employer is deactivated ");
        exit();
    }
}

if(isset($_GET['employerid']) && isset($_GET['deactivate'])){
    // echo $_GET['employeeid']."<br>";
    // echo $_GET['active']."<br>";
    $employerid=$_GET['employerid'];
    $sql="UPDATE employer set status='active', bantime = NOW() where id='$employerid' ";
    if(mysqli_query($connection,$sql)){
        header("Location: admin_employerlist.php?status_msg=Employer is actived ");
        exit();
    }
}

?>