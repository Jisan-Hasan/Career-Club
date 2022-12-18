<?php
session_start();
require '../database.php';

if(isset($_GET['userid']) && isset($_GET['active'])){
    
    $userid=$_GET['userid'];
    //$sql="UPDATE user set status='deactivate' where id='$userid' ";
    $sql="UPDATE user SET status='deactivate', bantime = DATE_ADD(NOW(), INTERVAL 7 DAY) WHERE id='$userid'";
    if(mysqli_query($connection,$sql)){
        header("Location: admin_userlist.php?status_msg=User is deactivated for 7 days");
        exit();
    }else{
        echo $connection->error;
    }
}

if(isset($_GET['userid']) && isset($_GET['deactivate'])){

    $userid=$_GET['userid'];
    $sql="UPDATE user set status='active' , bantime = NOW() where id='$userid' ";
    if(mysqli_query($connection,$sql)){
        header("Location: admin_userlist.php?status_msg=User is actived ");
        exit();
    }else{
        echo $connection->error;
    }

}

?>