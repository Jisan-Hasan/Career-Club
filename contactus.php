<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        <a class="nav-link" href="user/user_login.php">User</a>
      </li>

      <!--Employee-->
      <li class="nav-item">
        <a class="nav-link" href="employer/index.php">Employer</a>
      </li>
      
    </ul>
  </div>
</nav>

<!--End Nav Bar -->
 
    <br><br>
    <div style="width: 60%" class="container w3-panel w3-card-4 w3-green ">
            <h2>Contact Us</h2>
            <hr>
            <form action="contactus.php" method="post">
                <div class="form-group">
                    <!--<label for="name"> Name : </label>-->
                    <input required type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <!--<label for="email">Email : </label>-->
                    <input required type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <!--<label for="Mobile">Mobile: </label>-->
                    <input required type="text" maxlenth="14" class="form-control" name="mobile" placeholder="Mobile">
                </div>
                <div class="form-group">
                    <!--<label for="Comment"> Comment : </label>-->
                    <textarea class="form-control" name="comment" placeholder="Write something.." style="height:150px"></textarea>
                </div>
                
                <button Type="submit" name="contactus"class ="btn btn-info">Submit</button>
                <br><br>
            </form>
          

            </div>
        </div>
    </div>
          

    <?php
        if(isset($_POST['contactus'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $comment=$_POST['comment'];

            $id= uniqid();
            $sql="INSERT into contactus values('$id','$name','$email','$mobile','$comment')";
            if(mysqli_query($connection,$sql)){
                echo "Request submitted. Will be contact soon";
            }else{
                echo "Couldn't sent the message";
            }
        }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>