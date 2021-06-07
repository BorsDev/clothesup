<?php
    $pId = $_GET["item_id"];
    $fetch_sql = "SELECT * FROM product JOIN brand on product.BRAND_ID = Brand.BRAND_ID JOIN category ON product.CAT_ID = category.CAT_ID WHERE product.P_ID = $pId";
    $fetch_query = mysqli_query($conn, $fetch_sql);
    $fetch_item = mysqli_fetch_array($fetch_query);
?>       
        <!--item detail-->
        <div class="container cont-detail">
            <div class="container">
                <div class="row py-4">
                    <div class="col-sm-6 img-column">
                        <img src="img/product_img/<?php echo $fetch_item['P_PHOTO'];?>" class="rounded mx-auto d-block detailed-img img-fluid" alt="<?php echo $fetch_item['P_NAME'];?>" style="height:400px;">
                    </div>
                    <div class="col-sm-6 detail-column">
                        <h4><b><?php echo $fetch_item['P_NAME'];?></b></h4>
                        <p class="mb-2 text-muted text-uppercase small"><?php echo $fetch_item['CAT_NAME'];?> <span aria-hidden="true">•</span>  By <?php echo $fetch_item['BRAND_NAME'];?></p>
                        <h4 class="py-2"><b>Rp<?php echo number_format($fetch_item['P_PRICE']*1000 , 0 , ",", ".");?></b></h4>
                        <div class="p_desc py-2">
                            <p class="font-size-12">
                                <?php echo $fetch_item['P_DESC'];?>
                            </p>
                        </div>
                        <a href="incl/addcart.act.php?item_id=<?php echo $fetch_item['P_ID'];?>" class="form-control btn btn-success">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>