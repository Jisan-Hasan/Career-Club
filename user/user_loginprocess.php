<?php

session_start();
require '../database.php';

if(isset($_POST['userlogin'])){
    $email=$_POST['email'];

    $password=$_POST['password'];
    $encrypt_password=hash('sha256',$password);

    $login_sql="SELECT * FROM user WHERE email='$email' AND password='$encrypt_password' ";
    $login_result = mysqli_query($connection,$login_sql);
    $user_row = mysqli_fetch_assoc($login_result);

    $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
    $today =$tday->format('Y-m-d H:i:s');
    $bantime=$user_row['bantime'];
    $today_time = strtotime($today);
    $expire_time = strtotime($bantime);

    if($user_row['email'] == $email && $user_row['password']== $encrypt_password ){
        if($user_row['authentication']!="unverified"){
            if($today_time>$expire_time && $user_row['status']=='active' ){
                $_SESSION['userid']=$user_row['id'];
                $_SESSION['username'] = $user_row['username'];
                $_SESSION['gender'] = $user_row['gender'];
                $_SESSION['email'] = $user_row['email'];
                $_SESSION['mobile'] = $user_row['mobile'];
                $_SESSION['location'] = $user_row['location'];
                $_SESSION['position'] = $user_row['position'];
                header("location: user_home.php ");
                exit();

             }
            elseif($user_row['status']=='deactivate'){
                header("Location: user_login.php?status_msg= User account is banned untill ".$bantime." " );
                exit();
            }
        }else{
            $_SESSION['email']=$user_row['email'];
            $_SESSION['otp']=$user_row['otp'];
            $_SESSION['position']=$user_row['position'];
            $_SESSION['authentication']=$user_row['authentication'];
            
            header("Location: user_otpverify.php");
            exit();
        }
    }
    else{
        header("Location: user_login.php?login_failed= Login failed. Invalid email or password." );
        exit();
    
    }
}

?>
