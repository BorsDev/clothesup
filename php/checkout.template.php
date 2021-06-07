<?php
    $user_id = $_SESSION['U_ID'];
    $T_SUM  = 0;

    $cart_detail_sql = 
    "SELECT * FROM cart_container
    JOIN cart ON cart_container.CART_ID = cart.CART_ID
    JOIN product ON cart_container.P_ID = product.P_ID
    JOIN category ON product.CAT_ID = category.CAT_ID
    JOIN brand ON product.BRAND_ID = brand.BRAND_ID
    WHERE U_ID = $user_id AND cart.CART_STATUS = 'PENDING'";

    $cart_detail_query = mysqli_query($conn, $cart_detail_sql);

?>
        <!--cart detail-->
        <section id="Checkout">
            <div class="container-fluid mb-2">
                <div class="row">
                    <!--grand total-->
                    <div class="col-sm-3">
                        <div class="container" style="
                            height: 494px;
                            border-top-left-radius: 38px;
                            border-top-right-radius: 38px;
                            border-bottom-left-radius: 38px;
                            border-bottom-right-radius: 38px;
                            border: 1px solid black;">
                            <div class="border-dark border-bottom" style="
                                position: absolute;
                                width: 91.5%;
                                top: 0px;
                                left: 15px;
                                text-align: center;">
                                <h4 class="mt-1 py-3">Grand Total</h4>
                            </div>
                            <div class="container-fluid" style="
                                position: absolute;
                                top: 80px;
                                left: 0px;">
                            <?php
                                while ($p= mysqli_fetch_array($cart_detail_query))
                                {
                                    $sub_sum = $p['P_B_QTY']* $p['P_PRICE'];
                                    $T_SUM += $sub_sum;
                            ?>
                                <div class="mb-3 px-3">
                                    <label for="item<?php echo $p['P_ID'];?>"><?php echo $p['P_NAME'];?></label>
                                    <div id="item<?php echo $p['P_ID'];?>" class="container-fluid">
                                        <div class="row text-nowrap">
                                            <div class="col-sm-2"><?php echo $p['P_B_QTY'];?> pcs</div>
                                            <div class="col-sm-1 text-center">*</div>
                                            <div class="col-sm-4">Rp.<?php echo number_format($p['P_PRICE']*1000, 0 , ",", ".");?>&nbsp&nbsp:</div>
                                            <div class="col-sm-4">Rp.<?php $t_price = number_format($p['P_PRICE']*1000*$p['P_B_QTY'], 0 , ",", "."); echo $t_price;?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                            <div class="border-dark border-top" style="
                                position: absolute;
                                width: 91.5%;
                                top: 400px;
                                left: 15px;
                                text-align: center;">
                                <h4 class="mt-1">TOTAL</h4>
                                <h4><b><?php echo "Rp.",number_format($T_SUM*1000,0,',','.');?></b></h4>
                            </div>
                        </div>
                    </div>
                    <!--tf info-->
                    <div class="col-sm-3">
                        <!--payment info-->
                        <div class="container" style="
                            height: 323px;
                            border-top-left-radius: 38px;
                            border-top-right-radius: 38px;
                            border-bottom-left-radius: 38px;
                            border-bottom-right-radius: 38px;
                            border: 1px solid black;">
                            <div class="border-dark border-bottom" style="
                                position: absolute;
                                width: 91.5%;
                                top: 0px;
                                left: 15px;
                                text-align: center;">
                                <h4 class="mt-1 py-3">Payment Info</h4>
                            </div>
                            <div class="container-fluid" style="
                                position: absolute;
                                width: 100%;
                                top: 80px;
                                left: 0px;">
                                <div class="mb-2 mx-3">
                                    <div id="item1" class="container">
                                        <div class="row">
                                            <div class="col">Info</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tf bukti-->
                        <div class="container mt-3" style="
                            height: 154px;
                            border-top-left-radius: 38px;
                            border-top-right-radius: 38px;
                            border-bottom-left-radius: 38px;
                            border-bottom-right-radius: 38px;
                            border: 1px solid black;">
                            <h4 class="py-3 text-center">Payment Attachment</h4>
                            <div class="border-dark border-top" style="
                                position: absolute;
                                width: 91.5%;
                                top: 400px;
                                left: 15px;
                                text-align: center;">
                                <form action="incl/payment.act.php" method="post" class= text-dark enctype="multipart/form-data">
                                    <div class="form-group mt-1 mx-1">
                                        <label class="col-form-label col-form-label-sm" for="uploadIMG">Upload Bank Transfer IMG</label>
                                        <input id="uploadIMG" type="file" name="item_img" class="form-control form-control-sm" required>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--reciever info-->
                    <div class="col-sm-6">
                        <div class="container-fluid" style="
                            height: 494px;
                            border-top-left-radius: 38px;
                            border-top-right-radius: 38px;
                            border-bottom-left-radius: 38px;
                            border-bottom-right-radius: 38px;
                            border: 1px solid black;">
                            <div class="border-dark border-bottom" style="
                                position: absolute;
                                width: 95.5%;
                                top: 0px;
                                left: 15px;
                                text-align: center;">
                                <h4 class="mt-1 py-3">Reciever Info</h4>
                            </div>
                            <div class="container-fluid" style="
                                position: absolute;
                                width: 100%;
                                top: 80px;
                                left: 0px;
                            ">
                                <div class="mb-2 mx-3">
                                    <div id="item1" class="container">
                                            <div class="row">
                                                <div class="mb-2 form-group col">
                                                    <label class="col-form-label col-form-label-sm" for="FName" >First Name</label>
                                                    <input type="text" name="Fname" class="form-control form-control-sm" id="FName" placeholder="First Name" required>
                                                </div>
                                                <div class="mb-2 form-group col">
                                                    <label class="col-form-label col-form-label-sm" for="Lname">Last Name</label>
                                                    <input type="text" name="Lname" class="form-control form-control-sm" id="Lname" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <label class="col-form-label col-form-label-sm" for="Emailinput">Email</label>
                                                <input type="text" name="email" class="form-control form-control-sm" id="Emailinput" placeholder="Ex. yourname@hotmail.com" required>
                                            </div>
                                            <div class="row">
                                                <div class="mb-2 form-group col">
                                                    <label class="col-form-label col-form-label-sm" for="PNumber">Phone Number</label>
                                                    <input type="text" name="Pnumber" class="form-control form-control-sm" id="PNumber" placeholder="Phone Number" required>
                                                </div>
                                                <div class="mb-2 form-group col">
                                                    <label class="col-form-label col-form-label-sm" for="PCode">Postal Code</label>
                                                    <input type="text" name="PCode" class="form-control form-control-sm" id="PCode" placeholder="Postal Code" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-2 form-group col">
                                                    <label class="col-form-label col-form-label-sm" for="Province">Province</label>
                                                    <input type="text" name="Province" class="form-control form-control-sm" id="Province" placeholder="Province" required>
                                                </div>
                                                <div class="mb-2 form-group col">
                                                    <label class="col-form-label col-form-label-sm" for="City">City</label>
                                                    <input type="text" name="City" class="form-control form-control-sm" id="City" placeholder="City" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <label class="col-form-label col-form-label-sm" for="Address">Address</label>
                                                <input type="text" name="Address" class="form-control form-control-sm" id="Address" placeholder="Address" required>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary my-2">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>