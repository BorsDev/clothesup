         <!--product-->
         <div id="product">
            <!--header product-->
            <h2 class="headline py-2 px-5 my-5">Product</h2>
            <!--category-->
            <div class="container-fluid py-3">
                <h3 class="product-dec">Shirt / Jacket</h3>
                <!--carousel card-->
                <div id="product-card">
                    <div class="owl-carousel owl-theme">
                    <?php
                        $fetch_sql = "SELECT * FROM product";
                        $fetch_query = mysqli_query($conn, $fetch_sql);
                        while($product = mysqli_fetch_array($fetch_query)){
                    ?>
                        <div class="card">
                            <a href="itemDetail.php?item_id=<?php echo $product['P_ID']?>">
                                <img class="card-img-top img-fluid" style="height:100px;" src="img/product_img/<?php echo $product['P_PHOTO']?>" alt="<?php echo $product['P_NAME']?>">
                            </a>    
                            <div class="card-body">
                                <span class="text-nowrap"><?php echo $product['P_NAME']?></span>
                                <p>Rp <?php echo number_format($product['P_PRICE']*1000)?></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!--end of product-->