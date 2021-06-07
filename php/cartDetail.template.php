<?php
    $user_id = $_SESSION['U_ID'];

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
        <section id="cart">
            <div class="container-fluid">
                <h5 class="text-center py-3">My Cart</h5>
            <?php
                if(mysqli_num_rows($cart_detail_query) < 1)
                {
            ?>
                <div class="container-fluid mt-5">
                    <h1 class="text-center"> NO ITEM IN YOUR SHOPPING CART YET</h1>
                    <h1 class="text-center">START SHOP NOW!</h1>
                    <a href="index.php" class="d-flex justify-content-center btn btn-success my-5">Go to Shop</a>
                </div>
            <?php
                }
                else
                {
            ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-9">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0" colspan="2">Product Name</th>
                                        <th class="border-top-0 text-center" colspan="3">Qty</th>
                                        <th class="border-top-0 text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($p = mysqli_fetch_array($cart_detail_query))
                                        {
                                    ?>
                                    <tr class="border-bottom">
                                        <td><?php echo $p['P_ID'];?></td>
                                        <td>
                                            <img src="img/product_img/<?php echo $p['P_PHOTO'];?>" alt="foto_product" style="height:100px; width:130px;" class="rounded">
                                        </td>
                                        <td>
                                            <p><?php echo $p['P_NAME'];?></p>
                                            <span class="mb-2 text-muted text-uppercase small"><?php echo $p['CAT_NAME'];?> <span aria-hidden="true">•</span>  By <?php echo $p['BRAND_NAME'];?></span>
                                        </td>
                                        <td class="text-center">
                                            <a href="incl/minqty.act.php?minitem_id=<?php echo $p['P_ID'];?>">
                                                <i class="fa fa-minus-circle"></i>
                                            </a>
                                        </td>
                                        <td class="text-center"><?php echo $p['P_B_QTY'];?></td>
                                        <td class="text-center">
                                            <a href="incl/addqty.act.php?additem_id=<?php echo $p['P_ID'];?>">
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">Rp. <?php echo number_format($p['P_PRICE']*$p['P_B_QTY']*1000);?></td>
                                        <td>
                                            <a href="incl/removeitem.act.php?delitem_id=<?php echo $p['P_ID'];?>">
                                                <i class="fa fa-times-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="d-flex flex-row-reverse mx-5">
                                <a href="checkOut.php" class="btn btn-success mt-3">Check Out!</a>
                            </div>
                        </div>
                        <div class="col-sm-3 text-center">
                            <h3>Hewllo iklan</h3>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
        </section>