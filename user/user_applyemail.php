<?php
require '../database.php';


// Downloads files
   if(isset($_GET['jobid']) && isset($_GET['userid'])){
        $job_id=$_GET['jobid'];
        $user_id=$_GET['userid'];
       
        $applysql="SELECT * FROM jobapply where userid='$user_id' AND jobid='$job_id' ";
        $applysqlresult=mysqli_query($connection,$applysql);
        $apply_row=mysqli_fetch_assoc($applysqlresult);

        $applyid=$apply_row['id'];
    
        // fetch file to download from database
        $sql = "SELECT employer.email,jobpost.title FROM employer INNER JOIN jobpost ON employer.id=jobpost.employerid 
                WHERE jobpost.id=(SELECT jobid FROM jobapply WHERE id='$applyid')";
        $sqlresult = mysqli_query($connection, $sql);
        $result_row=mysqli_fetch_assoc($sqlresult);

        $email_to=$result_row['email'];
        $jobname=$result_row['title'];

        $filesql="SELECT jobapply.id AS jobid,jobapply.cv,user.name From jobapply INNER JOIN user ON jobapply.userid=user.id where jobapply.id='$applyid' ";
        $filesqlresult=mysqli_query($connection,$filesql);
        $file = mysqli_fetch_assoc($filesqlresult);

        $filepath = '../cv/' . $file['cv'];
        $username=$file['name'];

        echo $email_to."<br>";
        echo $filepath."<br>";
        echo $username."<br>";
         
        require '../phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true; 

        $mail->Username = 'universityproject789@gmail.com';                 
        $mail->Password = 'jfnschrluonetuos';                    
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 25; 

        $mail->addAttachment("../cv/".$file['cv']);

        $mail->setFrom('universityproject789@gmail.com', 'University Project');
        $mail->addAddress($email_to);            
        $mail->isHTML(true);                                  

        $mail->Subject = "Applied for the ".$jobname." job";
        $mail->Body ="I $username applied for $jobname job.<br> below here is my cv";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->Send())
        {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
        }else{
            header("Location:user_appliedjobview.php?apply_msg=Successfully applied for the job.");
            exit();
            // echo "mailed";
        }

   }

?>

