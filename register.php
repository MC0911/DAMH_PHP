<?php include 'head_fot/header.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("entities/user.class.php");

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_address = $_POST['user_address'];
    $user_phonenumber = $_POST['user_phonenumber'];

    $new_user = new User($user_name, $user_email, $user_password, $user_address, $user_phonenumber);
    $result = $new_user->register();
    if ($result) {
        echo "Đăng ký thành công!";
        header("Location: login.php");
        exit();
    } else {
        echo "<p style='color: red;'>Đăng ký thất bại. Email đã tồn tại!</p>";
    }

}
?>


<div class="container">
    <h2 class="mt-5">Đăng ký</h2>
    <form action="" method="POST" class="mt-3">
        <div class="form-group">
            <label for="user_name">Tên đăng nhập:</label>
            <input type="text" id="user_name" name="user_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_email">Email:</label>
            <input type="email" id="user_email" name="user_email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_password">Mật khẩu:</label>
            <input type="password" id="user_password" name="user_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_address">Địa chỉ:</label>
            <input type="text" id="user_address" name="user_address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_phonenumber">Số điện thoại:</label>
            <input type="number" id="user_phonenumber" name="user_phonenumber" class="form-control" required>
        </div>
        <button class="btn btn-dark" type="submit" style="margin-bottom: 25px;">Đăng ký</button>
    </form>
</div>

<?php include 'head_fot/footer.php'; ?>
