<?php 
include 'head_fot/header.php'; 
?>

<?php 
require_once("./entities/products.class.php");
$products = Product::list_product();
$hot_products = Product::list_product_by_status("Hot");
$new_products = Product::list_product_by_status("New");
?>

<?php

include 'db.php';

if(isset($_POST['add_to_cart'])){

   $product_title = $_POST['product_title'];
   $product_price = $_POST['product_price'];
   $product_img = $_POST['product_img'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE cart_name = '$product_title'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(cart_name, cart_price, cart_image, cart_quantity) VALUES('$product_title', '$product_price', '$product_img', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}   

?>


<div class="content">
    <section class="featured-section">
        <h1>Sản phẩm mới</h1>
        <div class="product-list">
            <?php foreach ($new_products as $product): ?>
                <div class="product">
                    <form action="" method="post">
                        <img src="admin/images/<?php echo $product['product_img']; ?>">
                        <h3><?php echo $product['product_title']; ?></h3>
                        <h4>$<?php echo $product['product_price']; ?></h4>
                        <input type="hidden" name="product_title" value="<?php echo $product['product_title']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
                        <input type="hidden" name="product_img" value="<?php echo $product['product_img']; ?>">
                        <button type="submit" class="btn btn-primary" name="add_to_cart">Đặt hàng</button>
                        <a href="detail.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-secondary">Chi tiết</a>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="featured-section">
        <h1>Sản phẩm bán chạy</h1>
        <div class="product-list">
        <?php foreach ($hot_products as $product): ?>
                <div class="product">
                    <form action="" method="post">
                        <img src="admin/images/<?php echo $product['product_img']; ?>">
                        <h3><?php echo $product['product_title']; ?></h3>
                        <h4>$<?php echo $product['product_price']; ?></h4>
                        <input type="hidden" name="product_title" value="<?php echo $product['product_title']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
                        <input type="hidden" name="product_img" value="<?php echo $product['product_img']; ?>">
                        <button type="submit" class="btn btn-primary" name="add_to_cart">Đặt hàng</button>
                        <a href="detail.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-secondary">Chi tiết</a>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php include 'head_fot/footer.php'; ?>
