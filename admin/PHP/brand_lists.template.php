<?php
    require_once "../db/db.config.php";
    $container_query = "SELECT * FROM brand
                        JOIN ADMIN ON brand.create_id = admin.ADM_ID";
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
                        <h4 class="page-title">Brand Lists</h4>
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
                                <h2 class="py-1">Brand</h2>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr class="align-middle">
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Brand Name</th>
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
                                                    <td><?php echo $container_data['BRAND_ID'];?></td>
                                                    <td><?php echo $container_data['BRAND_NAME'];?></td>
                                                    <td><?php echo $container_data['ADM_UNAME'];?></td>
                                                    <td class="wrap-text"><?php echo $container_data['TIME_CREATED'];?></td>
                                                    <td>
                                                        <!--Button toggle update Brand -->
                                                        <button type="button" class="btn btn-warning mx-1 my-1 text-nowrap text-dark" data-bs-toggle="modal" data-bs-target="#myModalUpdateBrand<?php echo $container_data['BRAND_ID'];?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>

                                                        <!-- Modal for update Brand-->
                                                        <div class="modal fade" id="myModalUpdateBrand<?php echo $container_data['BRAND_ID'];?>" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="act/update_brand.act.php?brand_id=<?php echo $container_data['BRAND_ID'];?>" method="post" class= text-dark>
                                                                            <div class="mb-2">
                                                                                <label for="updateBrand" class="form-label">Update Brand</label>
                                                                                <input type="text" class="form-control" id="updateBrand" placeholder="Update Brand" name="up_brand" value="<?php echo $container_data['BRAND_NAME'];?>" required>
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
                                    <!--Button toggle add Brand -->
                                    <button type="button" class="btn btn-primary mx-1 my-1 text-nowrap text-dark" data-bs-toggle="modal" data-bs-target="#myModalAddbrand">Create Brand</button>

                                    <!-- Modal for add Brand-->
                                    <div class="modal fade" id="myModalAddbrand" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="act/create_brand.act.php" method="post" class= text-dark>
                                                        <div class="mb-2">
                                                            <label for="exampleFormControlInput1" class="form-label">Insert Brand</label>
                                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Insert Brand" name="new_brand" required>
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

            