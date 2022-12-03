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
    <title> Job Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class="w3-pale-yellow">
<?php
// navbar
    include 'employer_navbar.php';
?>


 
    <br>
    <div class="container w3-card-4 w3-green  ">
        <!-- <div class="row">
           <div class="col-md-8 col-md-offset-3 "> -->
            <h2>Employer Job Post</h2>
            <hr>
            <form action="employer_jobpostprocess.php" method="post">

               <div class="form-group ">
                    <!-- <label for="job title"> job title : </label> -->
                    <input required type="text" class="form-control" name="title" placeholder="Job Title">
                </div>
                <div class="form-group">
                   <!-- <input type="text" placeholder="enter a categories" name="categories" class="form-control">   -->
                   <select name="category"  class="form-control">
                        <option value="">Select Categories</option>
                        <?php
                            // fetch category from category table 
                            $sql = "select * from category";
                            $result = mysqli_query($connection,$sql);
                            if(mysqli_num_rows( $result) > 0){
                                while($row=mysqli_fetch_array($result)){
                        ?>
                            <option value="<?=$row['id']?>"><?= $row['name']?></option>
                        <?php
                                }
                            }else{
                        ?>
                            <option>No category found</option>
                        <?php
                            }
                        ?>

                   </select>
                   </div>
                <div class="form-group">
                    <!-- <label for="Location">Location: </label> -->
                    <input required type="text" class="form-control" name="location" placeholder="Location">
                </div>
                <div class="form-group">
                    <!-- <label for="Job Type">Job type : </label> -->
                    <select class="form-control"  name="type" id="type">
                        <option value="">Select Job Type</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Work From Home">Work From Home</option>
                        <!-- <option value="Work at office">Work AT Office</option> -->
                        <option value="Remote">Remote</option>
                        <option value="Others">others</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- <label for="Requirement">Requirement: </label> -->
                    <input required type="text" class="form-control" name="requirement" placeholder="Job Requirement">
                </div>
                <div class="form-group">
                    <!-- <label for="Education">Education: </label> -->
                    <input required type="text" class="form-control" name="education" placeholder="Educational Requirement">
                </div>
                <div class="form-group">
                    <!-- <label for="Experience">Experience: </label> -->
                    <input required type="text" class="form-control" name="experience" placeholder="experience">
                </div>
                <div class="form-group">
                    <!-- <label for="Salary ">Salray: </label> -->
                    <input required type="text" class="form-control" name="salary" placeholder="Salary">
                </div> 
                
                <div class="form-group">
                    <!-- <label for="Deadline ">Deadline: </label> -->
                    <input required class="form-control" type="datetime-local" name="deadline" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">     
                </div> 
                <button Type="submit" name="jobpost"class ="btn btn-info">Submit</button>
                <br><br>
           
          </form>
          

           </div>
           </div>
           </div>
           

    <?php
        if(isset($_GET['jobpost_fail'])){
            echo $_GET['jobpost_fail'];
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>