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
    <title>Applied Jobs View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" >     <!-- image -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body class=" w3-pale-yellow">

<?php
// navbar
    include 'user_navbar.php';
    $userid=$_SESSION['userid'];
    $sql="SELECT * from user where id='$userid' ";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
    $image = '../images/'.$row['image'];
?>

<div class="container rounded bg-white mt-5 mb-5 w3-card-4 w3-light-blue">
<h3 class="w3-center">User Profile</h3>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <!-- <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"> -->
                <form action="user_profileprocess.php" method="POST" enctype="multipart/form-data">
                <?php if(!empty($image)){?>
                <img class="rounded-circle mt-5" width="150px" src="<?=$image?>" alt="profile pic"><br><br>
                <?php }else{?>
                <input  style="margin: 0px 0px 0px 70px" type="file"id="image" name="image" accept="image/*"><br><br>
                <?php }?>
                <span class="font-weight-bold"><?= $row['name']?></span><br>
                <span class="text-black-50"><?= $row['email']?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input readonly type="text" class="form-control" placeholder="Name" name="name" value="<?= $row['name']?>"></div>
                    <div class="col-md-12"><label class="labels">Gender</label><input readonly type="text" class="form-control" placeholder="Gender" name="gender" value="<?= $row['gender']?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input readonly type="text" class="form-control" placeholder="enter phone number" name="mobile" value="<?= $row['mobile']?>"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input readonly type="text" class="form-control" placeholder="enter address"  name="location" value="<?= $row['location']?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input readonly type="email" class="form-control" placeholder="enter email id" value="<?= $row['email']?>"></div>
                    <div class="col-md-12"><label class="labels">Education</label><input readonly type="text" class="form-control" placeholder="education" name="education"  value="<?= $row['education']?>"></div>
                    <div class="col-md-12"><label class="labels">Skill</label><input readonly type="text" class="form-control" placeholder="enter skills" name="skill" value="<?= $row['skill']?>"></div>
                    
                </div>
                <div class="mt-5 text-center"><a class="btn btn-primary" href=user_profileedit.php?profileupdate=profileupdate">Update Profile</a></div>
                 </div>
        </div>
       
        <div class="col-md-4">    
            <div class="p-3 py-5">
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Experience </label><input readonly type="text" class="form-control" placeholder="experience" name="experience" value="<?= $row['experience']?>"></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input readonly type="text" class="form-control" placeholder="additional details" name="additional" value="<?= $row['additional']?>"></div>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
</div>

<?php
if(isset($_GET['profile_update'])){
    echo $_GET['profile_update'];
}
?>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

