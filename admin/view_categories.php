<?php
session_start();
require '../database.php';
$sql= "SELECT * FROM category";
$result= mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Category List </title>
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

  <div class="container">
    <h4 style="text-align: center">View Categories</h4>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered">
      <tr class="w3-green">
        <th>Name</th>
        <th>Action</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
      { ?>
      <tr  class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['name'] ?></td>
        <td>
          <a class="btn btn-warning" href="edit_delete_category.php?id= <?php echo $row['id']; ?>& edit=edit">Edit</a>
          <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="edit_delete_category.php?id= <?php echo $row['id']; ?>& delete=delete&name= <?php echo $row['name']; ?>"> Delete </a>
        </td>
      </tr>
      <?php }
      ?>
    </table>
  </div>
<br>


<?php
if(isset($_GET['category_add_success'])){
  echo $_GET['category_add_success'];
}
elseif(isset($_GET['category_update_success'])){
  echo $_GET['category_update_success'];
}
elseif(isset($_GET['category_update_failed'])){
  echo $_GET['category_update_failed'];
}
elseif(isset($_GET['category_delete_success'])){
  echo $_GET['category_delete_success'];
}
elseif(isset($_GET['category_delete_failed'])){
  echo $_GET['category_delete_failed'];
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>