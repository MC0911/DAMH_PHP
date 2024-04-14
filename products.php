<?php include 'head_fot/header.php'; ?>

<script>
    function sortProducts(category) {
        $.ajax({
            url: 'sort_products.php',
            type: 'GET',
            data: {
                category_id: category
            },
            success: function(response) {
                $('.product-list').html(response);
            }
        });
    }
</script>

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
    <h2>Sản phẩm</h2>

    <form action="" class="mb-3">
        <div class="radio-container">
            <input type="radio" id="all" name="category" value="all" onchange="sortProducts('all')" checked>
            <label for="all">Tất cả</label>
        </div>
        <?php
        require_once("./entities/products.class.php");
        $categories = Product::list_category();

        foreach ($categories as $category) {
            echo '<div class="radio-container">';
            echo '<input type="radio" id="' . $category['category_id'] . '" name="category" value="' . $category['category_id'] . '" onchange="sortProducts(' . $category['category_id'] . ')">';
            echo '<label for="' . $category['category_id'] . '">' . $category['category_name'] . '</label>';
            echo '</div>';
        }
        ?>
    </form>

    <div class="product-list">
        <?php
        require_once("./entities/products.class.php");
        $products = Product::list_product();
        foreach ($products as $product) {
            echo '<div class="product">';
            echo '<form action="" method="post">';
            echo '<img src="admin/images/' . $product['product_img'] . '">';
            echo '<h3>' . $product['product_title'] . '</h3>';
            echo '<h4 class="price">$' . $product['product_price'] . '</h4>';
            echo '<input type="hidden" name="product_title" value="' . $product['product_title'] . '">';
            echo '<input type="hidden" name="product_price" value="' . $product['product_price'] . '">';
            echo '<input type="hidden" name="product_img" value="' . $product['product_img'] . '">';
            echo '<button type="submit" class="btn btn-primary" name="add_to_cart" style="margin-right: 40px">Đặt hàng</button>';
            echo '<a href="detail.php?product_id=' . $product['product_id'] . '" class="btn btn-secondary">Chi tiết</a>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php include 'head_fot/footer.php'; ?>
