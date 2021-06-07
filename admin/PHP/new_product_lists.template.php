<?php
    require_once "../db/db.config.php";
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">New Product</h4>
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
                <div class="white-box">
                    <form action="act/create_item.act.php" method="post" class= text-dark enctype="multipart/form-data">    
                        <div class="row">
                            <!--Item Image-->
                            <div class="col-sm-6"> 
                                <!-- Uploaded image area-->
                                <div class="image-area mb-2"><img id="imageResult" src="#" alt="" class="border border-dark img-fluid rounded shadow-sm mx-auto d-block">
                                </div> 

                                <!--img- upload area--> 
                                <div class="form-group mt-4 py-1">
                                    <input id="upload" type="file" name="item_img" onchange="readURL(this);" class="form-control" required>
                                </div>
                            </div>
                            <!--Item Detail-->
                            <div class="col-sm-6">
                                <!--Name-->
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="item_name" placeholder="Product Name" required>
                                </div>
                                <!--Brand & Category-->
                                <div class="row">
                                    <!--Brand item-->
                                    <div class="col mb-2">
                                        <label for="brandSelect" class="form-label">Brand</label>
                                        <select class="form-control" id="brandSelect" name="item_brand">
                                            <option>Choose Brand</option>
                                            <?php
                                                //brand select
                                                $brand_select = "SELECT * FROM brand";
                                                $brand_select_query = mysqli_query($conn, $brand_select);

                                                //loop brand
                                                while($brand_data = mysqli_fetch_array($brand_select_query))
                                                {
                                            ?>
                                                <option><?php echo $brand_data['BRAND_ID']," - ", $brand_data['BRAND_NAME']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!--Category-->
                                    <div class="col mb-2">
                                        <label for="catSelect" class="form-label">Category</label>
                                        <select class="form-control" id="catSelect" name="item_cat">
                                            <option>Choose Category</option>        
                                            <?php
                                                //category select
                                                $category_select = "SELECT * FROM category";
                                                $category_select_query = mysqli_query($conn, $category_select);

                                                while($category_data = mysqli_fetch_array($category_select_query))
                                                {
                                            ?>
                                                <option><?php echo $category_data['CAT_ID']," - ", $category_data['CAT_NAME']?></option>
                                            <?php
                                                }
                                            ?>  
                                        </select>
                                    </div>
                                </div>
                                <!--price & qty-->
                                <div class="row">
                                    <!--Price-->
                                    <div class="col mb-2">
                                        <label for="exampleFormControlInput4" class="form-label">Price (In Thousand Rupiah)</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Price" name="item_price" required>
                                    </div>
                                    <!--Qty-->
                                    <div class="col mb-2">
                                        <label for="exampleFormControlQTY" class="form-label">Items QTY</label>
                                        <input type="text" class="form-control" id="exampleFormControlQTY" placeholder="Quantity" name="item_qty" required>
                                    </div>
                                </div>
                                <!--Supplier-->
                                <div class="mb-2">
                                    <label for="supplierSelect" class="form-label">Supplier</label>
                                    <select class="form-control" id="supplierSelect" name="item_supplier">
                                        <option>Choose Supplier</option>
                                        <?php
                                            //supplier select
                                            $supplier_select = "SELECT * FROM Supplier";
                                            $supplier_select_query = mysqli_query($conn, $supplier_select);

                                            //loop supplier
                                            while($supplier_data = mysqli_fetch_array($supplier_select_query))
                                            {
                                        ?>
                                        <option><?php echo $supplier_data['S_ID']," - ", $supplier_data['S_NAME']?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!--Desc area-->
                                <div class="mb-2">
                                    <label for="productdesc1" class="form-label">Description</label>
                                    <textarea class="form-control" id="productdesc1" rows="2" cols="40" name="item_desc">desc</textarea>
                                </div>
                            </div>
                            <div class="button-group text-center row">
                                <button type="submit" type="button" class="col btn btn-success mt-3" name="submit">Add Product!</button>
                            </div>
                        </div>
                    </form>
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