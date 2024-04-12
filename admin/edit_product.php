<?php

if (isset($_GET['edit_product'])) {

    $edit_id = $_GET['edit_product'];

    $get_p = "select * from products where product_id='$edit_id'";

    $run_edit = mysqli_query($con, $get_p);

    $row_edit = mysqli_fetch_array($run_edit);

    $p_id = $row_edit['product_id'];

    $p_title = $row_edit['product_title'];

    $p_cat = $row_edit['product_category'];

    $p_image = $row_edit['product_img'];

    $new_p_image = $row_edit['product_img'];

    $p_price = $row_edit['product_price'];

    $p_desc = $row_edit['product_desc'];

    $p_status = $row_edit['product_status'];

}


$get_p_cat = "select * from categories where category_id='$p_cat'";

$run_p_cat = mysqli_query($con, $get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['category_name'];


?>


<!DOCTYPE html>

<html>

<head>

    <title> Edit Products </title>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#product_desc,#product_features'
        });
    </script>

</head>

<body>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Edit Products

                    </h3>

                </div>

                <div class="panel-body">

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Title </label>

                            <div class="col-md-6">

                                <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

                            </div>

                        </div>


                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Category </label>

                            <div class="col-md-6">

                                <select name="product_category" class="form-control">

                                <option value="<?php echo $p_cat; ?>" > <?php echo $p_cat_title; ?> </option>

                                    <?php

                                    $get_p_cats = "select * from categories";

                                    $run_p_cats = mysqli_query($con, $get_p_cats);

                                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                        $p_category_id = $row_p_cats['category_id'];

                                        $p_category_name = $row_p_cats['category_name'];

                                        echo "<option value='$p_category_id' >$p_category_name</option>";
                                    }

                                    ?>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Image </label>

                            <div class="col-md-6">

                                <input type="file" name="product_img" class="form-control" >
                                <br><img src="images/<?php echo $p_image; ?>" width="70" height="70" >

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Price </label>

                            <div class="col-md-6">

                                <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Description </label>

                            <div class="col-md-6">

                                <input type="text" name="product_desc" class="form-control" required value="<?php echo $p_desc; ?>">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Status </label>

                            <div class="col-md-6">

                                <input type="text" name="product_status" class="form-control" required value="<?php echo $p_status; ?>">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>

<?php

if (isset($_POST['update'])) {

    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_status = $_POST['product_status'];
    $product_img = $_FILES['product_img']['name'];

    $temp_name = $_FILES['product_img']['tmp_name'];

    if (empty($product_img)) {

        $product_img = $new_p_image;
    }
    move_uploaded_file($temp_name, "images/$product_img");

    $update_product = "update products set product_category='$product_category',product_title='$product_title',product_img='$product_img',product_price='$product_price',product_status='$product_status',product_desc='$product_desc' where product_id='$p_id'";

    $run_product = mysqli_query($con, $update_product);

    if ($run_product) {

        echo "<script> alert('Product has been updated successfully') </script>";

        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
}

?>