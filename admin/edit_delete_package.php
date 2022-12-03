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
    <title> Edit Category </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/stylesheet.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/w3.css">
</head>
<body>


<?php 
  // NavBar
  include 'admin_navbar.php';
?>

<br>


<?php
    // edit action
    if(isset($_GET['id'])&& isset($_GET['edit'])){
      $id= $_GET['id'];
      $edit_sql = "SELECT * FROM package WHERE  id='$id' ";
      $edit_result = mysqli_query($connection, $edit_sql);
      $edit_row= mysqli_fetch_assoc($edit_result);
    }
    // Delete action
    elseif(isset($_GET['id'])&& isset($_GET['delete'])){
      $id= $_GET['id'];
      $delete_sql = "DELETE FROM package WHERE id= '$id' ";

      if(mysqli_query($connection, $delete_sql)) {
        header("Location:view_package.php?package_delete_success= Package Successfully deleted");
        exit;
      }else{
        header("Location:view_package.php?package_delete_failed= Failed to delete the Package.");
        exit;
      }
    }
  

?>
  <div class="container w3-card-4 w3-green  ">
    <h4 style="text-align: center">View Categories</h4>
    
    <h3> Editing Packages</h3>
     <hr>

      <form action="package_category_update.php" method="POST">
        <div class="form-group">

            <input type = 'hidden' name = 'package_id' value = "<?php echo $edit_row['id']?>"  >    
            <label for="Name"> Package Name : </label>
            <input required type="text" class="form-control" name= "package_name" value= "<?php echo $edit_row['name']?>">
            <label for="Number Of Post"> Number Of Post : </label>
            <input required type="text" class="form-control" name= "numberofpost" value= "<?php echo $edit_row['numberofpost']?>">
            <label for="Price"> Price : </label>
            <input required type="text" class="form-control" name= "package_price" value= "<?php echo $edit_row['price']?>">
        </div>
         <button class="w3-margin-bottom btn btn-info" type="submit" name= "package_update"class="btn btn-info"> Update </button><br>
         </form>
  </div>
<br>





<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>