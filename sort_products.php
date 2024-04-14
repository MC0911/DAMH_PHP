<?php
require_once("./entities/products.class.php");
require_once("config/db.class.php");

if(isset($_GET['category_id']) && $_GET['category_id'] !== 'all') {
    $category_id = $_GET['category_id'];

    $db = new Db();
    $sql = "SELECT * FROM products WHERE product_category = '$category_id'";
    $result = $db->select_to_array($sql);
        foreach ($result as $product) {
            echo '<div class="content">';
            echo '<div class="product-list">';
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
            echo "</div>";
            echo "</div>";
        }

} else {
    $db = new Db();
    $sql = "SELECT * FROM products";
    $result = $db->select_to_array($sql);
    foreach ($result as $product) {
        echo '<div class="content">';
        echo '<div class="product-list">';
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
        echo "</div>";
        echo "</div>";
    }
}

?>
