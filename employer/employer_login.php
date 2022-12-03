<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Employer home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">

 <!-- Nav bar -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">JobSeekers</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <!--Contact Us-->
      <li class="nav-item">
        <a class="nav-link" href="../contactus.php">Contact Us</a>
      </li>
      <!--Signup-->
      <li class="nav-item">
        <a class="nav-link" href="employer_signup.php">Signup</a>
      </li>
      
    </ul>
  </div>
</nav>

<!-- end nav bar -->
 
    <br><br><br>
    <div style="width: 60%" class="container w3-panel w3-card-4 w3-green ">
            <h2>Employer Login</h2>
            <hr>
            <form action="employer_loginprocess.php" method="post">
               <div class="form-group">
                    <!--<label for="email">Email : </label>-->
                    <input required type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
               <!--<label for="password">Password : </label>-->
               <input requirued type="password" class="form-control" name="password" placeholder="Password">
               </div>
            <button  Type="submit" name="employerlogin" class ="btn btn-info">Submit</button>
            <br><br>
            <p>Doesn't have any account. <a href="employer_signup.php" >Sign Up</a></p>
            </form>
            

          </div>
        </div>
    </div>

  
  <?php
    if(isset($_GET['signup_success'])){
    
      echo $_GET['signup_success'];
    }
    elseif(isset($_GET['login_failed'])){
      echo $_GET['login_failed'];
    }
    elseif(isset($_GET['status_msg'])){
      echo $_GET['status_msg'];
    }
    ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</body>
</html>