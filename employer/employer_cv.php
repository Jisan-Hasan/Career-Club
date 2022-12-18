<?php
require '../database.php';


// Downloads files

    if(isset($_GET['applyid']) && isset($_GET['download']) && $_GET['download']=='download'){
        $applyid=$_GET['applyid'];
       
        // fetch file to download from database
        $sql = "SELECT * FROM jobapply WHERE id='$applyid' ";
        $result = mysqli_query($connection, $sql);

        $file = mysqli_fetch_assoc($result);
        $filepath = '../cv/' . $file['cv'];


        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('../cv/' . $file['cv']));
            readfile('../cv/' . $file['cv']);
            exit;
            
        }else{
            header("Location:employer_viewjobapplication.php ?cv_msg=CV not found");
            exit();
        }
    }

    if(isset($_GET['applyid']) && isset($_GET['view']) && $_GET['view']=='view'){
        $applyid=$_GET['applyid'];
       
        // fetch file to download from database
        $sql = "SELECT * FROM jobapply WHERE id='$applyid' ";
        $result = mysqli_query($connection, $sql);

        $file = mysqli_fetch_assoc($result);
        $filepath = '../cv/' . $file['cv'];


        if (file_exists($filepath)) {

            header('Content-type: application/pdf');
  
            header('Content-Disposition: inline; filename="' . $filepath . '"');
              
            header('Content-Transfer-Encoding: binary');
              
            header('Accept-Ranges: bytes');
              
            // Read the file
            @readfile($filepath);
          
        }else{
            header("Location:employer_viewjobapplication.php ?cv_msg=CV not found");
            exit();
        }
    }
?>