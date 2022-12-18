<?php

session_start();
require '../database.php';

if(isset($_POST['jobpost'])){
    $id=uniqid();
    $title=$_POST['title'];
    $companyname=$_SESSION['companyame'];
    $category =$_POST['category'];
    $location =$_POST['location'];
    $type =$_POST['type'];
    $requirement =$_POST['requirement'];
    $education=$_POST['education'];
    $experience =$_POST['experience'];
    $salary =$_POST['salary'];
    $datetime=$_POST['deadline'];
    $employerid=$_SESSION['employerid'];
    $editlimit='2';
    $status='pending';

    
    //$deadline=strftime('%Y-%m-%d', strtotime($datetime));
    $deadline=date('Y-m-d H:i:s', strtotime($datetime));
    $packagesql="SELECT * from buypackage where employerid='$employerid' ";
    $packagesqlresult= mysqli_query($connection,$packagesql);
    $packagesql_row=mysqli_fetch_assoc($packagesqlresult);
    
    if($packagesql_row['numberofpost']>0){
        
        $postsql="INSERT INTO jobpost values('$id', '$title','$companyname','$category','$location','$type','$requirement','$experience','$salary','$employerid','$editlimit','$status','$education','$deadline')";
        if(mysqli_query($connection,$postsql)){

            $newnumberofpost=$packagesql_row['numberofpost']-1;

            $update_packagesql="UPDATE buypackage SET numberofpost='$newnumberofpost' where employerid='$employerid' ";
            if(mysqli_query($connection,$update_packagesql)){
                header("Location: employer_jobview.php?jobpost_success= Successfully post a job.Waiting for admin approval" );
                exit();
            }
            
        }else{
            header("Location: employer_jobpost.php?jobpost_fail= Job post failed." );
            exit();
        }
    }else{
        header("Location: employer_buypackage.php?package_buy= please buy a package. You have Zero post remaining" );
            exit();
        
    }
}

?>