<?php include 'head_fot/header.php'; ?>

<?php

@include 'db.php';

$userLoggedIn = false;
if (isset($_SESSION['user_email'])) {
    $userLoggedIn = true;
}

$order_name = "";
$order_address = "";
$order_phonenumber = "";

if ($userLoggedIn) {
    $user_email = $_SESSION['user_email'];
    $userInfo = User::getUserInfoByEmail($user_email);
    if ($userInfo) {
        $order_name = $userInfo['user_name'];
        $order_address = $userInfo['user_address'];
        $order_phonenumber = $userInfo['user_phonenumber'];
    }
}


if(isset($_POST['order_btn'])){

   $order_name = $_POST['order_name'];
   $order_address = $_POST['order_address'];
   $order_phonenumber = $_POST['order_phonenumber'];
   $order_size = $_POST['order_size'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['cart_name'] .' ('. $product_item['cart_quantity'] .') ';
         $product_price = $product_item['cart_price'] * $product_item['cart_quantity'];
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(order_name, order_address, order_phonenumber, order_size, total_products, total_price) VALUES('$order_name','$order_address','$order_phonenumber','$order_size','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Giá tiền : $".$price_total."  </span>
         </div>
         <div class='customer-details'>
            <p> Họ và tên : <span>".$order_name."</span> </p>
            <p> Địa chỉ : <span>".$order_address."</span> </p>
            <p> Số điện thoại : <span>".$order_phonenumber."</span> </p>
            <p> Size : <span>".$order_size."</span> </p>
         </div>
            <a href='products.php' class='btn'>Tiếp tục mua sắm</a>
         </div>
      </div>
      ";
   }

}

?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Hoàn thành đơn của bạn</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['cart_price'] * $fetch_cart['cart_quantity'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['cart_name']; ?>(<?= $fetch_cart['cart_quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>Your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Tổng tiền: $<?= $grand_total; ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Họ và tên</span>
            <input type="text" placeholder="Nhập họ và tên..." name="order_name" value="<?php echo $order_name; ?>" required>
         </div>
         <div class="inputBox">
            <span>Địa chỉ</span>
            <input type="text" placeholder="Nhập địa chỉ..." name="order_address" value="<?php echo $order_address; ?>" required>
         </div>
         <div class="inputBox">
            <span>Số điện thoại</span>
            <input type="number" placeholder="Nhập số điện thoại..." name="order_phonenumber" value="<?php echo $order_phonenumber; ?>" required>
         </div>
         <div class="inputBox">
            <span>Size</span>
            <select name="order_size">
               <option value="Large" selected>Large</option>
               <option value="Medium">Medium</option>
               <option value="Big">Big</option>
            </select>
         </div>
      </div>
      <input type="submit" class="btn btn-primary" value="Đặt hàng" name="order_btn" class="btn">
   </form>

</section>

</div>
