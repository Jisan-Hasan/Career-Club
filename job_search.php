<?php
session_start();
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
</head>
<body class="w3-pale-yellow">

<!--Start Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">CareerClub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        
      <!--Contact Us-->
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>

      <!--User-->
      <li class="nav-item">
        <a class="nav-link" href="user/index.php">User</a>
      </li>

      <!--Employee-->
      <li class="nav-item">
        <a class="nav-link" href="employer/index.php">Employer</a>
      </li>
      
    </ul>
  </div>
</nav>

<!--End Nav Bar -->

<?php

    if(isset($_GET['categoryid']) && isset($_GET['categorysearch']) ) {
        $categoryid=$_GET['categoryid'];

        $categorysearchsql="SELECT * From jobpost where categoryid='$categoryid' ";
        $categorysearchsqlresult=mysqli_query($connection,$categorysearchsql);
        
        $categorynamesql="SELECT name from category where id='$categoryid' ";
        $categorynamesqlresult=mysqli_query($connection,$categorynamesql);
        $name_row=mysqli_fetch_assoc($categorynamesqlresult);
        ?>
        <div class="container">
        <h4>Search result: <?php echo $name_row['name'] ?></h4>
        <hr>
        <div class="w3-panel w3-light-blue w3-card-4">
        <?php
        $flag=0;
        while($category_row=mysqli_fetch_assoc($categorysearchsqlresult)){
            $expire = $category_row['deadline']; //from database
            $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
            $today =$tday->format('Y-m-d H:i:s');
            $today_time = strtotime($today);
            $expire_time = strtotime($expire);
            $deadline=date('d-m-Y H:i:s', strtotime($expire));
            if($expire_time>$today_time && $category_row['status']=='approved'){
              $flag=1;
              echo "<h5><b>".$category_row['title']."</b></h5>";
              echo "<p>Company: ".$category_row['companyname']."</p>";
              echo "<p>Job Type: ".$category_row['type']."</p>";
              echo "<p>Requirement: ".$category_row['requirement']."</p>";
              echo "<p>Education: ".$category_row['education']."</p>";
              echo "<p>Experience: ".$category_row['experience']."</p>";
              echo "<p>Salary: ".$category_row['salary']."k</p>";
              echo "<p>Location: ".$category_row['location']."</p>";
              echo "<p>Deadline: ".$category_row['deadline']."</p>";
              echo "<a class ='btn btn-info' href='job_apply.php?jobid=".$category_row['id']."&apply=apply '>Apply</a> <br><br>";
            }
            echo "<hr>";
        }
        if($flag==0){
          echo "No Job Available right now";
        }
        echo "</div>";
        echo "</div>";
       
        
    }

    if(isset($_GET['parttime'])){
        $jobtype= $_GET['parttime'];
        
        $jobtypesql="SELECT * From jobpost where type='$jobtype' ";
        $jobtypesqlresult=mysqli_query($connection,$jobtypesql);
        ?>
        <div class="container">
        <h4>Search result: <?php echo $jobtype ?></h4>
        <hr>
        <div class="w3-panel w3-light-blue w3-card-4">
        <?php
        $flag=0;
        while($type_row=mysqli_fetch_assoc($jobtypesqlresult)){
            
            $expire = $type_row['deadline']; //time
            $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
            $today =$tday->format('Y-m-d H:i:s');
            $today_time = strtotime($today);
            $expire_time = strtotime($expire);
            $deadline=date('d-m-Y H:i:s', strtotime($expire));
            if($expire_time>$today_time && $type_row['status']=='approved'){
              $flag=1;
            
              echo "<h5><b>".$type_row['title']."</b></h5>";
              echo "<p>Company: ".$type_row['companyname']."</p>";
              echo "<p>Job Type: ".$type_row['type']."</p>";
              echo "<p>Requirement: ".$type_row['requirement']."</p>";
              echo "<p>Education: ".$type_row['education']."</p>";
              echo "<p>Experience: ".$type_row['experience']."</p>";
              echo "<p>Salary: ".$type_row['salary']."k</p>";
              echo "<p>Location: ".$type_row['location']."</p>";
              echo "<p>Deadline: ".$deadline."</p>";
              echo "<a class ='btn btn-info' href='job_apply.php?jobid=".$type_row['id']."&apply=apply '>Apply</a> <br><br>";
            }
            echo "<hr>";
        }

        if($flag==0){
          echo "No Job Available right now";
        }
        echo "</div>";
        echo "</div>";
    }

    if(isset($_GET['workformhome'])){
        $jobtype= $_GET['workformhome'];
        
        $jobtypesql="SELECT * From jobpost where type='$jobtype' ";
        $jobtypesqlresult=mysqli_query($connection,$jobtypesql);
        ?>
        <div class="container">
        <h4>Search result: <?php echo $jobtype ?></h4>
        <hr>
        <div class="w3-panel w3-light-blue w3-card-4">
        <?php
        $flag=0;
        while($type_row=mysqli_fetch_assoc($jobtypesqlresult)){
            $expire = $type_row['deadline']; //time
            $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
            $today =$tday->format('Y-m-d H:i:s');
            $today_time = strtotime($today);
            $expire_time = strtotime($expire);
            $deadline=date('d-m-Y H:i:s', strtotime($expire));
            if($expire_time>$today_time && $type_row['status']=='approved'){
              $flag=1;
              echo "<h5><b>".$type_row['title']."</b></h5>";
              echo "<p>Company: ".$type_row['companyname']."</p>";
              echo "<p>Job Type: ".$type_row['type']."</p>";
              echo "<p>Requirement: ".$type_row['requirement']."</p>";
              echo "<p>Education: ".$type_row['education']."</p>";
              echo "<p>Experience: ".$type_row['experience']."</p>";
              echo "<p>Salary: ".$type_row['salary']."k</p>";
              echo "<p>Location: ".$type_row['location']."</p>";
              echo "<p>Deadline: ".$deadline."</p>";
              echo "<a class ='btn btn-info' href='job_apply.php?jobid=".$type_row['id']."&apply=apply '>Apply</a> <br><br>";
            
            }
            echo "<hr>";
        }
        if($flag==0){
          echo "No Job Available right now";
        }
        echo "</div>";
        echo "</div>";
    }
   
    if(isset($_POST['search']) && isset($_POST['keyword']) && strlen($_POST['keyword'])>0 && strlen($_POST['location'])==0){
      $keyword=$_POST['keyword'];
      $keywordsql="SELECT * FROM jobpost WHERE title LIKE '%".$keyword."%'  ";
      $keywordsqlresult=mysqli_query($connection,$keywordsql);
      ?>
      <div class="container">
      <h4>Search result: <?php echo $keyword ?></h4>
      <hr>
      <div class="w3-panel w3-light-blue w3-card-4">
      <?php
      $flag=0;
        while($keyword_row=mysqli_fetch_assoc($keywordsqlresult)){
            $expire = $keyword_row['deadline']; //time
            $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
            $today =$tday->format('Y-m-d H:i:s');
            $today_time = strtotime($today);
            $expire_time = strtotime($expire);
            $deadline=date('d-m-Y H:i:s', strtotime($expire));
            if($expire_time>$today_time && $keyword_row['status']=='approved'){
              $flag=1;
              echo "<div style=color:black>";
              echo "<h5><b>".$keyword_row['title']."</b></h5>";
              echo "<p>Company: ".$keyword_row['companyname']."</p>";
              echo "<p>Job Type: ".$keyword_row['type']."</p>";
              echo "<p>Requirement: ".$keyword_row['requirement']."</p>";
              echo "<p>Education: ".$keyword_row['education']."</p>";
              echo "<p>Experience: ".$keyword_row['experience']."</p>";
              echo "<p>Salary: ".$keyword_row['salary']."k</p>";
              echo "<p>Location: ".$keyword_row['location']."</p>";
              echo "<p>Deadline: ".$deadline."</p>";
              echo "<a class ='btn btn-info' href='job_apply.php?jobid=".$keyword_row['id']."&apply=apply '>Apply</a> <br><br>";
            
            }
           echo "<hr>";
        }
        if($flag==0){
          echo "No Job Available right now";
        }
        echo "</div>";
        echo "</div>";    
      }

      if(isset($_POST['search']) && isset($_POST['location']) && strlen($_POST['location'])>0 && strlen($_POST['keyword'])==0){
        $location=$_POST['location'];
        //echo $location;
        $locationsql="SELECT * FROM jobpost WHERE location='$location' ";
        $locationsqlresult=mysqli_query($connection,$locationsql);
        ?>
        <div class="container">
        <h4>Search result: <?php echo $location ?></h4>
        <hr>
        <div class="w3-panel w3-light-blue w3-card-4">
        <?php
        $flag=0;
          while($location_row=mysqli_fetch_assoc($locationsqlresult)){
              $expire = $location_row['deadline']; //time
              $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
              $today =$tday->format('Y-m-d H:i:s');
              $today_time = strtotime($today);
              $expire_time = strtotime($expire);
              $deadline=date('d-m-Y H:i:s', strtotime($expire));
              if($expire_time>$today_time && $location_row['status']=='approved'){
                $flag=1;
                echo "<h5><b>".$location_row['title']."</b></h5>";
                echo "<p>Company: ".$location_row['companyname']."</p>";
                echo "<p>Job Type: ".$location_row['type']."</p>";
                echo "<p>Requirement: ".$location_row['requirement']."</p>";
                echo "<p>Education: ".$location_row['education']."</p>";
                echo "<p>Experience: ".$location_row['experience']."</p>";
                echo "<p>Salary: ".$location_row['salary']."k</p>";
                echo "<p>Location: ".$location_row['location']."</p>";
                echo "<p>Deadline: ".$deadline."</p>";
                echo "<a class ='btn btn-info' href='job_apply.php?jobid=".$location_row['id']."&apply=apply '>Apply</a> <br><br>";
              
              }
              echo "<hr>";
          }
          if($flag==0){
            echo "No Job Available right now";
          }
          echo "</div>";
          echo "</div>";
        
        }

        if(isset($_POST['search']) && isset($_POST['keyword']) && isset($_POST['location']) && strlen($_POST['location'])>0 && strlen($_POST['keyword'])>0){
          $keyword=$_POST['keyword'];
          $location=$_POST['location'];
         
          $searchsql="SELECT * FROM jobpost WHERE title LIKE '%".$keyword."%' AND location='$location' ";
          $searchsqlresult=mysqli_query($connection,$searchsql);
          
          ?>
          <div class="container">
          <h4>Search result: keyword: <?php echo $keyword ?> Location: <?php echo $location ?></h4>
          <hr>
          <div class="w3-panel w3-light-blue w3-card-4">
          <?php
          $flag=0;
            while($search_row=mysqli_fetch_assoc($searchsqlresult)){
             
                $expire = $search_row['deadline']; //time
                $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
                $today =$tday->format('Y-m-d H:i:s');
                $today_time = strtotime($today);
                $expire_time = strtotime($expire);
                $deadline=date('d-m-Y H:i:s', strtotime($expire));
                if($expire_time>$today_time && $search_row['status']=='approved'){
                  $flag=1;
                  echo "<h5><b>".$search_row['title']."</b></h5>";
                  echo "<p>Company: ".$search_row['companyname']."</p>";
                  echo "<p>Job Type: ".$search_row['type']."</p>";
                  echo "<p>Requirement: ".$search_row['requirement']."</p>";
                  echo "<p>Education: ".$search_row['education']."</p>";
                  echo "<p>Experience: ".$search_row['experience']."</p>";
                  echo "<p>Salary: ".$search_row['salary']."k</p>";
                  echo "<p>Location: ".$search_row['location']."</p>";
                  echo "<p>Deadline: ".$deadline."</p>";
                  echo "<a class ='btn btn-info' href='job_apply.php?jobid=".$search_row['id']."&apply=apply '>Apply</a> <br><br>";
                
                }
                echo "<hr>";
            }
            if($flag==0){
              echo "No Job Available right now";
            }
            echo "</div>";
            echo "</div>";    

       }

       if(isset($_GET['deadline']) && $_GET['deadline']=='next24hours' ){
        $tomorrow = date("Y-m-d", strtotime('tomorrow'));

        $jobtypesql="SELECT * From jobpost where deadline > (NOW()) AND deadline<= (NOW() + INTERVAL 1 DAY)";
        $jobtypesqlresult=mysqli_query($connection,$jobtypesql);
        ?>
        <div class="container">
        <h4>Search result: Deadline next 24 Hours</h4>
        <hr>
        <div class="w3-panel w3-light-blue w3-card-4">
        <?php
        $flag=0;
        while($type_row=mysqli_fetch_assoc($jobtypesqlresult)){
            $expire = $type_row['deadline']; //time
            $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
            $today =$tday->format('Y-m-d H:i:s');
            $today_time = strtotime($today);
            $expire_time = strtotime($expire);
            $deadline=date('d-m-Y H:i:s', strtotime($expire));
            if($expire_time>$today_time && $type_row['status']=='approved'){
              $flag=1;
              echo "<h5><b>".$type_row['title']."</b></h5>";
              echo "<p>Company: ".$type_row['companyname']."</p>";
              echo "<p>Job Type: ".$type_row['type']."</p>";
              echo "<p>Requirement: ".$type_row['requirement']."</p>";
              echo "<p>Education: ".$type_row['education']."</p>";
              echo "<p>Experience: ".$type_row['experience']."</p>";
              echo "<p>Salary: ".$type_row['salary']."k</p>";
              echo "<p>Location: ".$type_row['location']."</p>";
              echo "<p>Deadline: ".$deadline."</p>";
              echo "<a class ='btn btn-info' href='job_apply.php?jobid=".$type_row['id']."&apply=apply '>Apply</a> <br><br>";
            }
            echo "<hr>";
        }
        if($flag==0){
          echo "No Job Available right now";
        }
        echo "</div>";
        echo "</div>";
      }

      
      if(isset($_POST['search']) && isset($_POST['keyword']) && isset($_POST['location']) && strlen($_POST['location'])==0 && strlen($_POST['keyword'])==0){
        ?>
        <div class="container">
        <h4>Search result: <?php echo $location ?></h4>
        <hr>
        <div class="w3-panel w3-light-blue w3-card-4">
        <?php
        echo "<h5>Nothing to show</h5>";
        echo "</div>";
        echo "</div>"; 
      }

?>