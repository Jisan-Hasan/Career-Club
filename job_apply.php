<?php
    session_start();
    require 'database.php';

    if(isset($_GET['jobid']) && !isset($_SESSION['userid']) && !isset($_SESSION['position']) ){
        header("Location: user/user_login.php?jobapplymsg=First Login into user account for apply");
        exit();
    }
    // elseif(isset($_GET['jobid']) && isset($_SESSION['userid']) && isset($_SESSION['position']) ){
    //         header("Location: user/user_cvupload.php");
    //         exit();
        
    // }
?>