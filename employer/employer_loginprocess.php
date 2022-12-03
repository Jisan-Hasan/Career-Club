<?php

session_start();
require '../database.php';

if(isset($_POST['employerlogin'])){
    $email=$_POST['email'];

    $password=$_POST['password'];
    $encrypt_password=hash('sha256',$password);

    $login_sql="SELECT * FROM employer WHERE email='$email' AND password='$encrypt_password' ";
    $login_result = mysqli_query($connection,$login_sql);
    $employer_row = mysqli_fetch_assoc($login_result);


    $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
    $today =$tday->format('Y-m-d H:i:s');
    $bantime=$employer_row['bantime'];
    $today_time = strtotime($today);
    $expire_time = strtotime($bantime);
        
    if($employer_row['email'] == $email && $employer_row['password']== $encrypt_password  ){
        if($employer_row['authentication']!="unverified"){
            if($today_time>$expire_time && $employer_row['status']=='active' ){

                $_SESSION['employerid']=$employer_row['id'];
                $_SESSION['name'] = $employer_row['name'];
                $_SESSION['companyame'] = $employer_row['companyname'];
                $_SESSION['location'] = $employer_row['location'];
                $_SESSION['email'] = $employer_row['email'];
                $_SESSION['mobile'] = $employer_row['mobile'];
                $_SESSION['position'] = $employer_row['position'];
                header("location: employer_home.php ");
                exit();

            }elseif($employer_row['status']=='deactivate'){
                header("Location: employer_login.php?status_msg= Employer account is banned untill ".$bantime." ");
                exit();
            }
        }else{
            $_SESSION['email']=$employer_row['email'];
            $_SESSION['otp']=$employer_row['otp'];
            $_SESSION['position']=$employer_row['position'];
            $_SESSION['authentication']=$employer_row['authentication'];        
            
            header("Location: employer_otpverify.php");
            exit();
        }
    }
    else{
        header("Location: employer_login.php?login_failed= Login failed. Invalid email or password." );
        exit();
    }
}

?>
