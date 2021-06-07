<?php
    require_once "../db/db.config.php";
    $container_query = "SELECT * FROM category
                        JOIN ADMIN ON category.creator_id = admin.ADM_ID";
    $container_sql = mysqli_query($conn, $container_query);
?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Category Lists</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="container-fluid text-center">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr class="align-middle">
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Category Name</th>
                                                    <th class="border-top-0">Created By</th>
                                                    <th class="border-top-0">Time Created</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while($container_data = mysqli_fetch_array($container_sql)){
                                                ?>
                                                <tr class="align-middle">
                                                    <td><?php echo $container_data['CAT_ID'];?></td>
                                                    <td><?php echo $container_data['CAT_NAME'];?></td>
                                                    <td><?php echo $container_data['ADM_UNAME'];?></td>
                                                    <td class="wrap-text"><?php echo $container_data['time_created'];?></td>
                                                    <td>
                                                        <!--Button toggle update category -->
                                                        <button type="button" class="btn btn-warning mx-1 my-1 text-nowrap text-dark" data-bs-toggle="modal" data-bs-target="#myModalUpdateCat<?php echo $container_data['CAT_ID'];?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>

                                                        <!-- Modal for update category-->
                                                        <div class="modal fade" id="myModalUpdateCat<?php echo $container_data['CAT_ID'];?>" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="act/update_cat.act.php?cat_id=<?php echo $container_data['CAT_ID'];?>" method="post" class= text-dark>
                                                                            <div class="mb-2">
                                                                                <label for="updateCat" class="form-label">Update Category</label>
                                                                                <input type="text" class="form-control" id="updateCat" placeholder="Update Category" name="up_cat" value="<?php echo $container_data['CAT_NAME'];?>" required>
                                                                            </div>
                                                                            <div class="button-group">
                                                                                <button type="button" class="btn btn-warning text-dark mt-3" data-bs-dismiss="modal">Cancel</button>
                                                                                <button type="submit" type="button" class="btn btn-success mt-3" name="submit">Update</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Button toggle add category -->
                                    <button type="button" class="btn btn-primary mx-1 my-1 text-nowrap text-dark" data-bs-toggle="modal" data-bs-target="#myModalAddCat">Create Category</button>

                                    <!-- Modal for add category-->
                                    <div class="modal fade" id="myModalAddCat" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="act/create_category.act.php" method="post" class= text-dark>
                                                        <div class="mb-2">
                                                            <label for="exampleFormControlInput1" class="form-label">Insert Category</label>
                                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Insert Category" name="new_cat" required>
                                                        </div>
                                                        <div class="button-group">
                                                            <button type="button" class="btn btn-warning text-dark mt-3" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" type="button" class="btn btn-success mt-3" name="submit">Create</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            