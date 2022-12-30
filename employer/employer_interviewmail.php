<?php
session_start();
require '../database.php';

    if(isset($_GET['applyid']) && isset($_GET['id']) &&isset($_GET['link']) && isset($_GET['password']) && isset($_GET['time']) && isset($_GET['duration']) ){
        $jobapplyid=$_GET['applyid'];

        $sql="SELECT user.name,user.email,jobpost.title FROM jobapply INNER JOIN user ON jobapply.userid=user.id
                INNER JOIN jobpost ON jobapply.jobid=jobpost.id WHERE jobapply.id='$jobapplyid' ";
        $result=mysqli_query($connection,$sql);
        $row=mysqli_fetch_assoc($result);

        $username=$row['name'];
        $useremail=$row['email'];
        $jobname=$row['title'];

        $meeting_id=$_GET['id'];
        $meeting_link=$_GET['link'];
        $meeting_passwrod=$_GET['password'];
        $meeting_time=$_GET['time'];

       


        require '../phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                              

        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                              
              
        $mail->Username = 'universityproject789@gmail.com';      // your mail           
        $mail->Password = 'wbmvavyxhhmveqgh';                    // mail less secure option password 
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 25;                                    

        $mail->setFrom('universityproject789@gmail.com', 'University Project');         // user your above mail
        $mail->addAddress($useremail);            
        $mail->isHTML(true);                                  

        $mail->Subject = 'Interview Call';
        $mail->Body    = "Congratulations, ".$username." you have been selected for <b>".$jobname."</b> job. You will be interviewed through zoom meeting. <br><br>
                        meeting link: ".$meeting_link." <br>  meeting id: ".$meeting_id." <br> meeting password: ".$meeting_passwrod." <br> 
                        Your interview time: ".$meeting_time." <br>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {

            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            header( "Location: employer_interviewlistprocess.php?interview_msg=Applicant has been called for interview&jobtitle=".$jobname." " );
            exit();
        }
    }
    ?>