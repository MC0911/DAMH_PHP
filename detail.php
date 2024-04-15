<?php include 'head_fot/header.php'; ?>

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

<style>
    .product-detail {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-detail img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .product-detail h2 {
        font-size: 24px;
        color: #333;
        margin-top: 20px;
    }

    .product-detail h3.price {
        color: #fc0000;
        margin-top: 10px;
    }

    .product-detail p {
        color: #666;
        margin-top: 10px;
    }

    .product-detail form {
        margin-top: 20px;
    }

    .product-detail button.btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .product-detail button.btn:hover {
        background-color: #0056b3;
    }

    .product-detail a.btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #666;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .product-detail a.btn:hover {
        background-color: #444;
    }

</style>

<div class="content">
    <?php
    if(isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        require_once("./entities/products.class.php");
        $product_detail = Product::getProductDetail($product_id);
        
    ?>
    <div class="product-detail">
        <img src="admin/images/<?php echo $product_detail['product_img']; ?>">
        <h2><?php echo $product_detail['product_title']; ?></h2>
        <h3 class="price">$<?php echo $product_detail['product_price']; ?></h3>
        <p><?php echo $product_detail['product_desc']; ?></p>
        <form action="" method="post">
            <input type="hidden" name="product_title" value="<?php echo $product_detail['product_title']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $product_detail['product_price']; ?>">
            <input type="hidden" name="product_img" value="<?php echo $product_detail['product_img']; ?>">
            <button type="submit" class="btn btn-primary" name="add_to_cart">Đặt hàng</button>
        </form>
        <a href="index.php" class="btn btn-secondary">Trở về</a>
    </div>
    <?php
    } else {
        echo "<div class='content'><p>Không tìm thấy thông tin sản phẩm.</p></div>";
    }
    ?>
</div>

<?php include 'head_fot/footer.php'; ?>
