<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> View Categories

                </h3>

            </div>

            <div class="panel-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped">

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            $i = 0;

                            $get_cats = "select * from categories";

                            $run_cats = mysqli_query($con, $get_cats);

                            while ($row_cats = mysqli_fetch_array($run_cats)) {

                                $cat_id = $row_cats['category_id'];

                                $cat_title = $row_cats['category_name'];


                                $i++;



                            ?>

                                <tr>

                                    <td><?php echo $i; ?></td>

                                    <td><?php echo $cat_title; ?></td>


                                    <td>

                                        <a href="index.php?delete_category=<?php echo $cat_id; ?>">

                                            <i class="fa fa-trash-o"></i> Delete

                                        </a>

                                    </td>

                                    <td>

                                        <a href="index.php?edit_category=<?php echo $cat_id; ?>">

                                            <i class="fa fa-pencil"></i> Edit

                                        </a>

                                    </td>

                                </tr>


                            <?php } ?>

                        </tbody>

                    </table>


                </div>

            </div>

        </div>

    </div>

</div>