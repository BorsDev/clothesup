<?php
    require_once "../db/db.config.php";

    $user_sql = "SELECT * FROM user";
    $user_query = mysqli_query($conn, $user_sql);
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
                        <h4 class="page-title">Users</h4>
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
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">User</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">E-Mail</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while ($user_data = mysqli_fetch_array($user_query)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <img src="img/profile_pics/user.png" alt="user-img" width="40" class="rounded-circle">
                                            </td>
                                            <td>
                                                <span class="no-wrap"><?php echo $user_data['U_FNAME']," ", $user_data['U_LNAME'];?></span>
                                                </br>
                                                <span>Kepulauan Riau, Batam 294111</span>
                                            </td>
                                            <td>+68-815-3456-7890</td>
                                            <td><?php echo $user_data['U_EMAIL'];?></td>
                                            <td>online</td>
                                            <td>
                                                <div class="container">
                                                    <div class="row">
                                                        <button class="btn btn-primary col mx-1 my-1 text-light">
                                                            <i class="fa fa-info" aria-hidden="true"></i>
                                                        </button>

                                                        <button class="btn btn-warning col mx-1 my-1 text-light">
                                                            <i class="fas fa-pause" aria-hidden="true"></i>
                                                        </button>

                                                        <button class="btn btn-danger col mx-1 my-1 text-light">
                                                            <i class="far fa-trash-alt" aria-hidden="true"></i>
                                                        </button>
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