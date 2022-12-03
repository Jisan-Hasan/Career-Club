<?php
session_start();
require '../database.php';

if(isset($_POST['employerSignup'])){

    $id=uniqid();
    $name=$_POST['name'];
    $companyName=$_POST['companyName'];
    $location=$_POST['location'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    
    $password=$_POST['password'];
    $encrypt_password=hash('sha256',$password);

    $position='employer';
    $otp=rand(100000, 999999);
    $authentication="unverified";
    $status='active';
    $email_check_sql="SELECT * FROM employer  WHERE email='$email' ";
    
    $employer_email_check = mysqli_query($connection,$email_check_sql);
    if(mysqli_num_rows($employer_email_check) == 1){
        header("Location: employer_signup.php?signup_failed= $email is already registered.Please try with another email" );
        exit();
    }
    else{
        $signup_sql=" INSERT INTO employer (id,name,companyname,location,email,mobile,password,position,otp,authentication,status) VALUES ('$id', '$name', '$companyName','$location','$email','$mobile','$encrypt_password','$position','$otp','$authentication','$status')";
        if($connection->query($signup_sql)){
              $_SESSION['otp']=$otp;
              $_SESSION['position']=$position;
              $_SESSION['email']=$email;
              $_SESSION['authentication']=$authentication;
              
              header( "Location: employer_otpsend.php" );
              exit;
        }else{
            // echo $connection->error;
            header("Location: employer_signup.php?signup_failed=Registration Failed." );
            exit;
            
        }
    }
}

?>
