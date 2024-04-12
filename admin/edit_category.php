<?php

if (isset($_GET['edit_category'])) {

    $edit_id = $_GET['edit_category'];

    $edit_cat = "select * from categories where category_id='$edit_id'";

    $run_edit = mysqli_query($con, $edit_cat);

    $row_edit = mysqli_fetch_array($run_edit);

    $c_id = $row_edit['category_id'];

    $c_name = $row_edit['category_name'];

}

?>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> Edit Category

                </h3>

            </div>

            <div class="panel-body">

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">

                        <label class="col-md-3 control-label">Category Title</label>

                        <div class="col-md-6">

                            <input type="text" name="category_name" class="form-control" required value="<?php echo $c_name; ?>">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label"></label>

                        <div class="col-md-6">

                            <input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php

if (isset($_POST['update'])) {

    $category_name = $_POST['category_name'];

    $update_cat = "update categories set category_name='$category_name' where category_id='$c_id'";

    $run_cat = mysqli_query($con, $update_cat);

    if ($run_cat) {

        echo "<script>alert('One Category Has Been Updated')</script>";

        echo "<script>window.open('index.php?view_category','_self')</script>";
    }
}



?>