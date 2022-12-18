<?php
session_start();
require '../database.php';

if(isset($_POST['usersignup'])){

    $id=uniqid();
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $encrypt_password=hash('sha256',$password);
    $location=$_POST['location'];
    $position='user';
    $otp=rand(100000, 999999);
    $authentication="unverified";
    $status='active';
    $email_check_sql="SELECT * FROM user  WHERE email='$email' ";
    
    $user_email_check = mysqli_query($connection,$email_check_sql);
    if(mysqli_num_rows($user_email_check) == 1){
        header("Location: user_signup.php?signup_failed= $email is already registered.Please try with another email" );
        exit();
    }
    else{
        $signup_sql=" INSERT INTO user (id,name,gender,email,mobile,password,position,otp,authentication,status,location) VALUES ('$id', '$name','$gender','$email','$mobile','$encrypt_password','$position','$otp','$authentication','$status','$location')";
        if($connection->query($signup_sql)){
              $_SESSION['otp']=$otp;
              $_SESSION['position']=$position;
              $_SESSION['email']=$email;
              $_SESSION['authentication']=$authentication;
              
              header( "Location: user_otpsend.php" );
              exit;
        }else{
            header("Location: user_signup.php?signup_failed=Registration Failed." );
            exit;
        }
    }
}

?>
