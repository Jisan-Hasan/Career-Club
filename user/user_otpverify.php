<?php
session_start();

require '../database.php';

?>

<?php
        if(isset($_SESSION['email'])&& isset($_SESSION['otp']) && isset($_SESSION['authentication']) && isset($_SESSION['position']))
        {
          
            if(isset($_POST['verify']) && $_SESSION['position'] =='user' )
            {
                $email=$_SESSION['email'];
                $otpvalue=$_POST['otp'];
               
                if(is_numeric($otpvalue)){
                    $otp_sql = "SELECT otp,authentication FROM user WHERE email='$email' ";
                    
                    $otp_result = mysqli_query($connection,$otp_sql);
                    $row = mysqli_fetch_assoc($otp_result);
                   
                    if($row['otp']== $otpvalue)
                    {
                        $verified="Verified";
                        $verified_sql = "UPDATE user SET authentication ='$verified'  WHERE email = '$email' ";
                        $verfied_result=mysqli_query($connection,$verified_sql);
                        
                        if($verfied_result=== TRUE ){
                            session_unset();
                            session_destroy();
                            header("Location: user_login.php?signup_success= Registration Successfully.");
                            exit;
                            
                        }
                    }else{
                        echo "Invalid OTP. please write corrently";
                    }
                }
                else{
                    echo "Invalid OTP. please write corrently";
                }
            }
        }else{
            header("Location: user_login.php.php");
        }
          
        if(isset($_POST['resend']) && $_SESSION['position']=='user')
        {
            $otp=rand(100000, 999999);
            $_SESSION['otp']=$otp;
            $_SESSION['position']='user';
            $email=$_SESSION['email'];

            $sql = "UPDATE user SET otp='$otp' WHERE email='$email'";
            $connection->query($sql);
            include 'user_otpsend.php';
        }
        
        
    ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleverify.css">
    <title>otp verify</title>
</head>
<body>
    <form class="form" action="user_otpverify.php" method="post" >
        <h1 class="login-title">Account Verify</h1>
        <p>we send confirmation code.please check your email</p>
        <input type="text" maxlength="6" size="6" class="login-input" name="otp" placeholder="otp number" autofocus="true" />
        <input type="submit" value="Verify" name="verify" style="margin-bottom: 10px" class="login-button"/>
        <input type="submit" value="Resend" name="resend" class="login-button"/>
    </form>


    
</body>
</html>