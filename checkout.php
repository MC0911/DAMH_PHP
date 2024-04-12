<?php include 'head_fot/header.php'; ?>

<?php

@include 'db.php';

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
            <span class='total'> Total : $".$price_total."  </span>
         </div>
         <div class='customer-details'>
            <p> Your name : <span>".$order_name."</span> </p>
            <p> Your address : <span>".$order_address."</span> </p>
            <p> Your phonenumber : <span>".$order_phonenumber."</span> </p>
            <p> Your size : <span>".$order_size."</span> </p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete your order</h1>

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
      <span class="grand-total"> Grand total : $<?= $grand_total; ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Your name</span>
            <input type="text" placeholder="enter your name" name="order_name" required>
         </div>
         <div class="inputBox">
            <span>Your address</span>
            <input type="text" placeholder="enter your address" name="order_address" required>
         </div>
         <div class="inputBox">
            <span>Your phonenumber</span>
            <input type="number" placeholder="enter your phonenumber" name="order_phonenumber" required>
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
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>
