

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Signup </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/stylesheet.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">

 <!-- Nav bar -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">CareerClub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <!--Signup-->
      <li class="nav-item">
        <a class="nav-link" href="index.php">Login</a>
      </li>
      
    </ul>
  </div>
</nav>

<!-- end nav bar -->
 
    <br><br>
    <div style="width: 60%" class="container w3-panel w3-card-4 w3-green ">
          <h2>Admin Signup</h2>
          <hr>
          <form action="admin_signupprocess.php" method="post">
            <div class="form-group">
            <!--<label for="name"> Name : </label>-->
              <input  type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <!--<label for="email">Email : </label>-->
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <!--<label for="admin_password">Password : </label>-->
              <input  type="password" class="form-control" name="password" placeholder="Password" requirued>
            </div>
           <button Type="submit" name="adminSignup"class ="btn btn-info">Submit</button>
           <br><br>
           <p>Already have an account. <a href="index.php" >Login</a></p>
           <!--<a class="btn btn-link" href="adminRegistration.php">create a new account</a>-->
          </form>

        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <?php
    // if(isset($_GET['success_message'])){
    //   echo $_GET['success_message'];
    // }
    if(isset($_GET['signup_failed'])){
      echo $_GET['signup_failed'];
    }
    ?>

</body>
</html>