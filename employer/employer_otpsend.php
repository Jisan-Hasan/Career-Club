<?php
   session_start();
   $email=$_SESSION['email'];
   $otp=$_SESSION['otp'];

        require '../phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = 1;                              

        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                              
        

        $mail->Username = 'universityproject789@gmail.com';      // your mail           
        $mail->Password = 'wbmvavyxhhmveqgh';                    // mail less secure option password 
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 25;                                    

        $mail->setFrom('universityproject789@gmail.com', 'University Project');         // user your above mail
        $mail->addAddress($email);            
        $mail->isHTML(true);                                  

        $mail->Subject = 'Confirm your email address';
        $mail->Body    = "Please verify your email with this given OTP"."<br>"."Your OTP is: <b>".$otp."</br> " ;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {

            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            header( "Location: employer_otpverify.php" );
        }

    ?>