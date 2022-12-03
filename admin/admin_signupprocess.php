
<?php
require '../database.php';

if (isset($_POST['adminSignup'])) {
    $id = uniqid();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypt_password = hash('sha256', $password);

    $email_check_sql = "SELECT * FROM admin  WHERE email='$email'";

    $admin_email_check = mysqli_query($connection, $email_check_sql);

    if (mysqli_num_rows($admin_email_check) === 1) {
        header("Location: admin_signup.php?signup_failed= $email is already registered.Please try with another email");
        exit();
    } else {
        $signup_sql = " INSERT INTO admin VALUES ('$id', '$name', '$email','$encrypt_password');";
        if ($connection->query($signup_sql)) {
            header("Location: admin_login.php?signup_success= Registration Successfully.");
            exit;
        } else {
            header("Location: admin_signup.php?signup_failed=Registration Failed.");
            exit;
        }
    }
}

?>