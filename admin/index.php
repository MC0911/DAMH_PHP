<?php

session_start();

include("db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

$admin_session = $_SESSION['admin_email'];

$get_admin = "select * from admins  where admin_email='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_name = $row_admin['admin_name'];


?>


<!DOCTYPE html>
<html>

<head>

    <title>Admin Panel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include("admin_panel.php");  ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php
                if(isset($_GET['add_product'])){

                    include("add_product.php");
                    
                }
                if(isset($_GET['view_product'])){

                    include("view_product.php");
                    
                }
                if(isset($_GET['delete_product'])){

                    include("delete_product.php");
                    
                }
                    
                if(isset($_GET['edit_product'])){
                    
                    include("edit_product.php");
                    
                }
                if(isset($_GET['add_category'])){
                    
                    include("add_category.php");
                    
                }
                if(isset($_GET['view_category'])){
                    
                    include("view_category.php");
                    
                }
                if(isset($_GET['delete_category'])){
                    
                    include("delete_category.php");
                    
                }
                if(isset($_GET['edit_category'])){
                    
                    include("edit_category.php");
                    
                }
                ?>
            </div>

        </div>

    </div>

    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php } ?>

