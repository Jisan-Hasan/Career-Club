<?php

session_start();
require '../database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Interview Tips</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">

 
<!--Start Nav Bar -->
<?php 
  include 'user_navbar.php';
?>
<!--End Nav Bar -->
    <br>
  <div class="container w3-light-blue">
    <h2 class="w3-center">Interviewing Tips</h2>  
    <div class="title"><h4>What Employers looking for:</h4></div>
    <div class="content">
        <p>Interviews can be very stressful, but the best way to overcome this is to be prepared and know what employers are looking for:</p>
        <ul>
            <li>Job candidates with a definite idea of their goals, objectives, strengths, and skills.</li>
            <li>Candidates who are knowledgeable about the position they are interviewing for, the company and its products, and the industry overall.</li>
            <li>Candidates who can match their own skills and experiences with the needs of the company.</li>
            <li>Candidates who are confident in themselves and their ability to contribute to the company.</li>
            <li>Candidates who can discuss past experiences and give specific examples that demonstrate their skills and accomplishments. </li>
        </ul>
    </div>  
    <div class="title"><h4>What Employers looking for:</h4></div>
    <div class="content">
    <ul>
        <li><strong>Research the company.</strong> It is good to become familiar with the organization, the position and the person who may be your boss. Try to match your skills and experience to the position you are seeking.</li>
        <li><strong>Know your resume.</strong> Be prepared to discuss and defend every aspect of your education and career experience.</li>
        <li><strong>Focus more on the interview, less on the job.</strong> There's time to evaluate the job and whether you want it after the interviewer has learned about you. For now, your goal is to get invited back for a second interview or an offer. Then you can decide if the job is just what you want.</li>
        <li><strong>Talk about your previous contributions.</strong> Prospective employers are interested in knowing how you made a difference in your previous job. In a way, you need to convince the interviewer that you're the answer to the company's needs.</li>
        <li><strong>Look for ways to sell yourself.</strong> Seize opportunities to tell the prospective employer how good you are. Be careful not to boast, but speak confidently about your skills.</li>
        <li><strong>Avoid fear by visualizing the interview.</strong> It's just an interview, not the gallows, so imagine the experience in advance. Try to visualize various things like your clothing, items to bring, physical presentation, eye contact, body language, etc.</li>
    </ul>
    </div> 
    <div class="title"><h4>Some Interview Tips Videos:</h4></div>
    <div class="tips">
    <a href="user_interviewtipsvideos.php">Click Here to know some interview tips and common questions</a>
    </div>                                          
    
  </div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>