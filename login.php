<?php include 'head_fot/header.php'; ?>

<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

require_once 'entities/user.class.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    $login_result = User::login($user_email, $user_password);

    if ($login_result) {
        $_SESSION['user_email'] = $user_email;
        header("Location: index.php");
        exit(); 
    } else {
        echo "Đăng nhập thất bại!";
    }
}
?>

<div class="container">
    <h2 class="mt-5">Đăng nhập</h2>
    <form action="" method="POST" class="mt-3">
        <div class="form-group">
            <label for="user_email">Email:</label>
            <input type="email" id="user_email" name="user_email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_password">Mật khẩu:</label>
            <input type="password" id="user_password" name="user_password" class="form-control" required>
        </div>
        <button class="btn btn-dark" type="submit">Đăng nhập</button>
    </form>
</div>

<?php include 'head_fot/footer.php'; ?>
