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
    <title>CV upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class=" w3-pale-yellow">

<?php
// navbar
    include 'user_navbar.php';
    //check already applied or not
?>

<?php
$jobid=$_GET['jobid'];
$userid=$_SESSION['userid'];
$applysql="SELECT * FROM jobapply where userid='$userid' AND jobid='$jobid' ";
$applysqlresult=mysqli_query($connection,$applysql);
$apply_num=mysqli_num_rows($applysqlresult);

if($apply_num==1){
    header("Location:user_appliedjobview.php?apply_msg=Already applied for the job");
    exit();
}
?>
    <br><br><br>
    <div class="container w3-light-blue ">
        <div class="row">
           <div class="col-md-8 col-md-offset-3">
                <h2 class="w3-greeen w3-padding-small" style="width: 60%">CV upload</h2>
                <hr>
                <form action="user_jobapply.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <!-- <label for="job title"> job title : </label> -->
                    
                    <input class="form-control" type="file" name="cvfile" id="fileSelect">
                    <input class="form-control" type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                    </div>
                    <button Type="submit" name="jobapply" value="jobapply" class ="btn btn-info">Submit</button>
                <br><br>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_GET['apply_msg'])){
            echo $_GET['apply_msg'];
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>