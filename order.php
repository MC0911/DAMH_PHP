<?php include 'head_fot/header.php'; ?>

<?php

@include 'db.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET cart_quantity = '$update_value' WHERE cart_id = '$update_id'");
   if($update_quantity_query){
      header('location:order.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$remove_id'");
   header('location:order.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:order.php');
}

?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Đặt hàng</h1>

   <table>

      <thead>
         <th>Image</th>
         <th>Sản phẩm</th>
         <th>Giá</th>
         <th>Số lượng</th>
         <th>Tổng tiền</th>
         <th>Action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="admin/images/<?php echo $fetch_cart['cart_image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['cart_name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['cart_price']); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['cart_id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['cart_quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = $fetch_cart['cart_price'] * $fetch_cart['cart_quantity']; ?></td>
            <td><a href="order.php?remove=<?php echo $fetch_cart['cart_id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">Tiếp tục mua sắm</a></td>
            <td colspan="3">Tổng cộng</td>
            <td>$<?php echo $grand_total; ?></td>
            <td><a href="order.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn btn-primary <?= ($grand_total > 1)?'':'disabled'; ?>" style="margin-bottom: 25px;">Thanh toán</a>
   </div>

</section>

</div>

<?php include 'head_fot/footer.php'; ?>
