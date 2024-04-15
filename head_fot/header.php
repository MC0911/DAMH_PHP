<?php
session_start(); 
require_once 'entities/user.class.php'; 
@include 'db.php';
function displayUserName() {
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $userInfo = User::getUserInfoByEmail($user_email);
        if ($userInfo) {
            echo $userInfo['user_name'];
        } else {
            echo "Guest";
        }
    } else {
        echo "Guest";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhóm 1</title>
    <link rel="stylesheet" href="styles/style.css">'
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <h1>Group 1</h1>
        <nav>
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="products.php">Sản phẩm</a></li>
                <?php
                    $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                    $row_count = mysqli_num_rows($select_rows);
                ?>
                <li><a href="order.php" class="order">Đặt hàng <span>(<?php echo $row_count; ?>)</span> </a></li>
                <li><a href="about.php">Giới thiệu</a></li>
                <li><a href="contact.php">Liên hệ</a></li>
                <?php 
                if (isset($_SESSION['user_email'])) {
                    echo '<li><a href="logout.php">Đăng xuất</a></li>';
                } else {
                    echo '<li><a href="login.php">Đăng nhập</a></li>';
                    echo '<li><a href="register.php">Đăng ký</a></li>';
                }
                ?>
            </ul>
        </nav>
        <div class="welcome">
            <h4>Welcome: <?php displayUserName(); ?></h4>
        </div>
    </header>

</body>
</html>
