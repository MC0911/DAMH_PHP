<?php

session_start();

include("db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

    <title>Admin Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="container">

        <form class="form-login" action="" method="post">

            <h2 class="form-login-heading">Admin Login</h2>

            <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>

            <input type="password" class="form-control" name="admin_password" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">

                Log in

            </button>


        </form>

    </div>



</body>

</html>

<?php

if (isset($_POST['admin_login'])) {

    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);

    $admin_password = mysqli_real_escape_string($con, $_POST['admin_password']);

    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_password='$admin_password'";

    $run_admin = mysqli_query($con, $get_admin);

    $count = mysqli_num_rows($run_admin);

    if ($count == 1) {

        $_SESSION['admin_email'] = $admin_email;

        echo "<script>alert('You are Logged in into admin panel')</script>";

        echo "<script>window.open('index.php?view_product','_self')</script>";
    } else {

        echo "<script>alert('Email or Password is Wrong')</script>";
    }
}

?>