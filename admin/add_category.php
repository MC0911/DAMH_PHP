<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> Insert Category

                </h3>

            </div>

            <div class="panel-body">

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">

                        <label class="col-md-3 control-label">Category Title</label>

                        <div class="col-md-6">

                            <input type="text" name="category_name" class="form-control">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label"></label>

                        <div class="col-md-6">

                            <input type="submit" name="submit" value="Insert Category" class="btn btn-primary form-control">

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php

if (isset($_POST['submit'])) {

    $category_name = $_POST['category_name'];

    $insert_cat = "insert into categories (category_name) values ('$category_name')";

    $run_cat = mysqli_query($con, $insert_cat);

    if ($run_cat) {

        echo "<script> alert('New Category Has Been Inserted')</script>";

        echo "<script> window.open('index.php?view_category','_self') </script>";
    }
}



?>