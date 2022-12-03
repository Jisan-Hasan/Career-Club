<?php

session_start();
require '../database.php';


  // for package update
  if(isset($_POST['package_update'])){
    $id=$_POST['package_id'];
    $name=$_POST['package_name'];
    $numberofpost=$_POST['numberofpost'];
    $price=$_POST['package_price'];
 
    $update_sql= "UPDATE package SET name='$name' ,numberofpost='$numberofpost',price='$price' WHERE id='$id' ";
    
    if(mysqli_query($connection, $update_sql)) {
      header("Location: view_package.php?package_update_success= Package Successfully updated" );
      exit;
    } 
    else {
      header("Location: view_package.php?package_update_failed= Failed to update the package." );
      exit;
    }
  }


  // for category update 
  if(isset($_POST['category_update'])){
    $id=$_POST['category_id'];
    $name=$_POST['category_name'];

    $update_sql= "UPDATE category SET name='$name' WHERE id='$id' ";
    
    if(mysqli_query($connection, $update_sql)) {
      header("Location: view_categories.php?category_update_success= Category Successfully updated" );
      exit;
    } 
    else {
      header("Location: view_categories.php?category_update_failed= Failed to update the category." );
      exit;
    }
  }


?>
