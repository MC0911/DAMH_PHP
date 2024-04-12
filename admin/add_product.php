<!DOCTYPE html>

<html>

<head>

    <title> Insert Products </title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
</head>

<body>

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Insert Products

                    </h3>

                </div>

                <div class="panel-body">

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Title </label>

                            <div class="col-md-6">

                                <input type="text" name="product_title" class="form-control" required>

                            </div>

                        </div>


                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Category </label>

                            <div class="col-md-6">

                                <select name="product_category" class="form-control">

                                    <option> Select a Product Category </option>

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

                                <input type="file" name="product_img" class="form-control" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Price </label>

                            <div class="col-md-6">

                                <input type="text" name="product_price" class="form-control" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Description </label>

                            <div class="col-md-6">

                                <input type="text" name="product_desc" class="form-control" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"> Product Status </label>

                            <div class="col-md-6">

                                <input type="text" name="product_status" class="form-control" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">

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

if (isset($_POST['submit'])) {

    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_status = $_POST['product_status'];
    $product_img = $_FILES['product_img']['name'];

    $temp_name = $_FILES['product_img']['tmp_name'];

    move_uploaded_file($temp_name, "images/$product_img");

    $add_product = "insert into products (product_category,product_title,product_img,product_price,product_desc,product_status) values ('$product_category','$product_title','$product_img','$product_price','$product_desc','$product_status')";

    $run_product = mysqli_query($con, $add_product);

    if ($run_product) {

        echo "<script>alert('Product has been inserted successfully')</script>";

        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
}

?>
