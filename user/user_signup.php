
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">
 

 <!-- Nav bar -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">CareerClub</a>  <!-- main home page -->
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
        <a class="nav-link" href="index.php">Login</a>
      </li>
      
    </ul>
  </div>
</nav>

<!-- end nav bar -->
 
    <br><br>
    <div style="width: 60%" class="container w3-panel w3-card-4 w3-green ">
            <h2>User Signup</h2>
            <hr>
            <form action="user_signupprocess.php" method="post">
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
                    <!--<label for="Gerder"> Gernder : </label>-->
                    <select class="form-control"  name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="prefer not to say">Prefer not to Say</option>
                    </select>
                </div>
                <div class="form-group">
                    <!--<label for="Location"> Location : </label>-->
                    <input required type="text" class="form-control" name="location" placeholder="Location">
                </div>
                <div class="form-group">
               <!--<label for="Password">Password : </label>-->
               <input requirued type="password" class="form-control" minlength="8" name="password" placeholder="Password">
                </div>
           <button Type="submit" name="usersignup"class ="btn btn-info">Submit</button>
           <br><br>
           <p>Already have an account. <a href="index.php" >Login</a></p>
           
          </form>
          

            </div>
        </div>
    </div>
          

           <?php
           if(isset($_GET['signup_failed'])){
            echo $_GET['signup_failed'];
          }
          ?>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>