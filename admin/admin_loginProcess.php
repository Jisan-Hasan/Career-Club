
<?php
session_start();

require '../database.php';
if (isset($_POST['adminLogin'])) {

    $email = $_POST['email'];

    $password = $_POST['password'];
    $encrypt_password = hash('sha256', $password);

    $login_sql = "SELECT * FROM admin WHERE email='$email' AND password='$encrypt_password' ";
    $login_result = mysqli_query($connection, $login_sql);
    $admin_row = mysqli_fetch_assoc($login_result);

    if ($admin_row['email'] == $email && $admin_row['password'] == $encrypt_password) {
        $_SESSION['admin_id'] = $admin_row['id'];
        $_SESSION['admin_name'] = $admin_row['name'];
        $_SESSION['admin_email'] = $admin_row['email'];
        header("Location: admin_home.php");
        exit;
    } else {
        header("Location: admin_login.php?login_failed= Login failed. Invalid email or password.");
        exit;
    }
}
?>