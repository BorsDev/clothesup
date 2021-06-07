<?php
    require_once "../db/db.config.php";

    $cart_sql = "SELECT * FROM cart JOIN user ON cart.U_ID = user.U_ID";
    $cart_query = mysqli_query($conn, $cart_sql);
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
                        <h4 class="page-title">Cart Info</h4>
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
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="table-responsive text-center">
                                        <table class="table">
                                            <thead>
                                                <tr class="align-middle">
                                                    <th class="border-top-0">Cart ID</th>
                                                    <th class="border-top-0">User</th>
                                                    <th class="border-top-0">Username</th>
                                                    <th class="border-top-0">Payment ID</th>
                                                    <th class="border-top-0">Payment Time</th>
                                                    <th class="border-top-0">Item Qty</th>
                                                    <th class="border-top-0">Grand Total</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($cart_data = mysqli_fetch_array($cart_query)) {
                                            ?>
                                                <tr class="align-middle">
                                                    <td><?php echo $cart_data['CART_ID'];?></td>
                                                    <td>
                                                        <img src="img/profile_pics/user.png" alt="user-img" width="40" class="rounded-circle">
                                                    </td>
                                                    <td class="text-nowrap"><?php echo $cart_data['U_FNAME']," ", $cart_data['U_LNAME'];?></td>
                                                    <td>1</td>
                                                    <td>23-12-2020 23:23:23</td>
                                                    <td>
                                                        <?php
                                                            $cart_id = $cart_data['CART_ID'];

                                                            $cart_detail_sql = "SELECT SUM(P_B_QTY) from cart_container
                                                            JOIN cart
                                                            ON cart.CART_ID = cart_container.CART_ID
                                                            WHERE cart.CART_ID = $cart_id";

                                                            $qty_sql = mysqli_query($conn, $cart_detail_sql);
                                                            $fetchqty = mysqli_fetch_assoc($qty_sql);
                                                            $mysum = $fetchqty['SUM(P_B_QTY)'];

                                                            if(!isset($mysum)){
                                                                echo "0 Pcs";
                                                            }
                                                            else{
                                                                echo $mysum, " Pcs";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <?php
                                                        $T_sum = 0;
                                                            $cart_id = $cart_data['CART_ID'];

                                                            $cart_detail_sql = "SELECT * FROM cart_container
                                                            JOIN cart
                                                            ON cart.CART_ID = cart_container.CART_ID
                                                            JOIN product 
                                                            ON cart_container.P_ID = product.P_ID
                                                            WHERE cart.CART_ID = $cart_id";

                                                            $sum_sql = mysqli_query($conn, $cart_detail_sql);
                                                            while($sum = mysqli_fetch_array($sum_sql)){
                                                                $sub_sum = $sum['P_B_QTY']* $sum['P_PRICE'];
                                                                $T_sum += $sub_sum;
                                                            }

                                                            echo "Rp ", number_format($T_sum*1000);
                                                        ?>
                                                    </td>
                                                    <td><?php echo $cart_data['CART_STATUS'];?></td>
                                                    <td>
                                                        <!--Button toggle update category -->
                                                        <button type="button" class="btn btn-warning mx-1 my-1 text-dark" data-bs-toggle="modal" data-bs-target="#myModalUpdateCart<?php echo $cart_id;?>">Detail</button>

                                                        <!-- Modal for update category-->
                                                        <div class="modal fade" id="myModalUpdateCart<?php echo $cart_id;?>" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-center" id="exampleModalLabel">
                                                                            Cart Detail - ID#<?php echo $cart_data['CART_ID'];?>
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <!--payment-->
                                                                                <div class="col-sm-6">
                                                                                    <h4>Payment Detail</h4>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table">
                                                                                            <tr>
                                                                                                <th class="border-top-0 border-bottom-0">Cart ID</th>
                                                                                                <td class="border-top-0 border-bottom-0">:</td>
                                                                                                <td class="border-top-0 border-bottom-0">
                                                                                                    <input type="text" class="form-control" value="<?php echo $cart_id?>" disabled>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th class="border-top-0 border-bottom-0">Username</th>
                                                                                                <td class="border-top-0 border-bottom-0">:</td>
                                                                                                <td class="border-top-0 border-bottom-0">
                                                                                                    <input type="text" class="form-control" value="<?php echo $cart_data['U_FNAME']," ", $cart_data['U_LNAME'];?>" disabled>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th class="border-top-0 border-bottom-0">Phone Number</th>
                                                                                                <td class="border-top-0 border-bottom-0">:</td>
                                                                                                <td class="border-top-0 border-bottom-0">
                                                                                                    <input type="text" class="form-control" value="<?php echo $cart_data['U_PNUM'];?>" disabled>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th class="border-top-0 border-bottom-0">Postal Code</th>
                                                                                                <td class="border-top-0 border-bottom-0">:</td>
                                                                                                <td class="border-top-0 border-bottom-0">
                                                                                                    <input type="text" class="form-control" value="29411" disabled>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th class="border-top-0 border-bottom-0">Address</th>
                                                                                                <td class="border-top-0 border-bottom-0">:</td>
                                                                                                <td class="border-top-0 border-bottom-0">
                                                                                                    <input type="text" class="form-control" value="Taman Nagoya Indah Blok m no. 3" disabled>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th class="border-top-0 border-bottom-0">Payment </th>
                                                                                                <td class="border-top-0 border-bottom-0">:</td>
                                                                                                <td class="border-top-0 border-bottom-0">
                                                                                                    <input type="text" class="form-control" value="NOT YET" disabled>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                                <!--cart details-->
                                                                                <div class="col-sm-6">
                                                                                    <h4>Cart Detail</h4>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>Photo</th>
                                                                                                    <th>Product Name</th>
                                                                                                    <th>Qty</th>
                                                                                                    <th>Total</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>

                                                                                            <?php
                                                                                                $cart_container_sql = "SELECT * FROM cart JOIN cart_container ON cart.CART_ID = cart_container.CART_ID JOIN product ON cart_container.P_ID = product.P_ID WHERE cart.CART_ID = $cart_id";
                                                                                                $cart_container_query = mysqli_query($conn, $cart_container_sql);
                                                                                                while ($cart_container_data = mysqli_fetch_array($cart_container_query)) {
                                                                                            ?>

                                                                                                <tr class="align-middle">
                                                                                                    <td><?php echo $cart_container_data['P_ID'];?></td>
                                                                                                    <td><img style="height:40px; width:50px;" src="img/product_img/photo1.png" alt=""></td>
                                                                                                    <td>
                                                                                                        <?php echo $cart_container_data['P_NAME'];?>
                                                                                                        </br>
                                                                                                        Adidas
                                                                                                    </td>
                                                                                                    <td><?php echo $cart_container_data['P_B_QTY']," PCS";?></td>
                                                                                                    <td class="text-nowrap">Rp <?php echo number_format($cart_container_data['P_B_QTY']*$cart_container_data['P_PRICE']*1000);?></td>
                                                                                                </tr>

                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                                <tr class="align-middle">
                                                                                                    <td colspan="4" class="border-bottom-0"><b>GRAND TOTAL</b></td>
                                                                                                    <td class="text-nowrap border-bottom-0"><b>Rp <?php echo number_format($T_sum*1000)?></b></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                                <button type="submit" onclick="location.href='index.php'" class="btn btn-success" disabled>Waiting for Payment</button>
                                                                            </div>
                                                                        </div>
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