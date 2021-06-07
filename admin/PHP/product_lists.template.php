<?php
    require_once "../db/db.config.php";
    $retrive_sql = "SELECT product.BRAND_ID, brand.BRAND_NAME,product.CAT_ID, category.CAT_NAME, product.P_ID, product.P_NAME, product.P_PHOTO, product.P_PRICE, product.P_QTY, product.INPUT_BY_ID, admin.ADM_ID, admin.ADM_UNAME, product.INPUT_TIME, product.EDITED_BY_ID, edt.ADM_ID, edt.ADM_UNAME AS editor, product.EDIT_TIME, product.P_DESC, supplier.S_ID, supplier.S_NAME
    FROM product
    JOIN brand ON brand.BRAND_ID = product.BRAND_ID
    JOIN category ON category.CAT_ID = product.CAT_ID
    JOIN admin ON admin.ADM_ID = product.INPUT_BY_ID
    JOIN admin edt ON edt.ADM_ID = product.EDITED_BY_ID
    JOIN supplier on supplier.S_ID = product.S_ID
    ORDER BY `product`.`P_ID` ASC";
    
    $retrive_query = mysqli_query($conn, $retrive_sql);
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
                        <h4 class="page-title">Product Lists</h4>
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
                                <table class="table text-center">
                                    <thead>
                                        <tr class="align-middle">
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Product Photo</th>
                                            <th class="border-top-0">Brand</th>
                                            <th class="border-top-0 text-nowrap">Product Name</th>
                                            <th class="border-top-0">Qty</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0 ">Input By </br> Input Time</th>
                                            <th class="border-top-0 ">Update By </br> Update Time</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <!--Loop Items-->
                                    <?php
                                        while ($retrive_product = mysqli_fetch_array($retrive_query))
                                        {  
                                    ?>
                                        <tr>
                                            <td><?php echo $retrive_product['P_ID'];?></td>
                                            <td>
                                                <img src="img/product_img/<?php echo $retrive_product['P_PHOTO'];?>" class="rounded" alt="<?php echo $retrive_product['P_NAME'];?>" style="height:100px; width:130px;">
                                            </td>
                                            <td><?php echo $retrive_product['BRAND_NAME'];?></td>

                                            <td><?php echo $retrive_product['P_NAME'];?></td>

                                            <td><?php echo $retrive_product['P_QTY'];?></td>

                                            <td class="text-nowrap"><?php echo "Rp ", number_format($retrive_product['P_PRICE']*1000);?></td>

                                            <td><?php echo $retrive_product['ADM_UNAME'], ", </br>",$retrive_product['INPUT_TIME'];?></td>

                                            <td><?php echo $retrive_product['editor'], ", </br>",$retrive_product['EDIT_TIME'];?></td>

                                            <!--Button Group-->
                                            <td>
                                                <div class="button-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <!--Button toggel restock modal-->
                                                            <button class="btn btn-success col mx-1 my-1 text-light" data-bs-toggle="modal" data-bs-target="#myModalRestock<?php echo $retrive_product['P_ID'];?>">
                                                                <i class="fas fa-plus"></i>
                                                            </button>

                                                            <!--modal for restock item-->
                                                            <div class="modal fade" id="myModalRestock<?php echo $retrive_product['P_ID'];?>" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="act/restock.act.php?item_id=<?php echo $retrive_product['P_ID'];?>" method="post" class= text-dark enctype="multipart/form-data">
                                                                                <div class="mb-2">
                                                                                    <label for="restockQTY" class="form-label">Restock QTY</label>
                                                                                    <input type="number" class="form-control" id="restockQTY" name="res_qty" placeholder="Restock QTY" required>
                                                                                </div>
                                                                                <button type="submit" type="button" class="btn btn-success mt-1" name="submit">Add Stock!</button>
                                                                                <button type="button" class="btn btn-warning text-dark mt-1" data-bs-dismiss="modal">Cancel</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Button toggle update modal -->
                                                            <button class="btn btn-warning col mx-1 my-1 text-light" data-bs-toggle="modal" data-bs-target="#myModalUpdate<?php echo $retrive_product['P_ID'];?>">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal for update item data-->
                                                            <div class="modal fade" id="myModalUpdate<?php echo $retrive_product['P_ID'];?>" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title text-center" id="exampleModalLabel">
                                                                            Update Item #<?php echo $retrive_product['P_ID'];?>
                                                                        </h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body bg-dark">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <img src="img/product_img/<?php echo $retrive_product['P_PHOTO'];?>" alt="<?php echo $retrive_product['P_NAME'];?>"class="bg-light rounded py-4 img-fluid max-width:100%; max-height:auto;">
                                                                                </div>
                                                                                <div class="col-sm-6 rounded py-3 bg-secondary">
                                                                                    <form action="act/update_item.act.php?item_id=<?php echo $retrive_product['P_ID'];?>" method="post" class= text-dark>
                                                                                        <!--nama item-->
                                                                                        <div class="mb-2">
                                                                                            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                                                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product Name" name="P_NAME" value="<?php echo $retrive_product['P_NAME'];?>" required>
                                                                                        </div>
                                                                                        <!--brand & category-->
                                                                                        <div class="row">
                                                                                            <!--Brand item-->
                                                                                            <div class="col mb-2">
                                                                                                <label for="brandSelect" class="form-label">Brand</label>
                                                                                                <select class="form-control" id="brandSelect" name="BRAND_NAME">
                                                                                                    <option selected><?php echo $retrive_product['BRAND_ID'],". ", $retrive_product['BRAND_NAME']?></option>
                                                                                                    <?php

                                                                                                        //brand select
                                                                                                        $brand_select = "SELECT * FROM brand";
                                                                                                        $brand_select_query = mysqli_query($conn, $brand_select);

                                                                                                        while($brand_data = mysqli_fetch_array($brand_select_query))
                                                                                                        {
                                                                                                    ?>
                                                                                                    <option><?php echo $brand_data['BRAND_ID'],". ", $brand_data['BRAND_NAME']?></option>
                                                                                                    <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                </select>
                                                                                            </div>
                                                                                            <!--Category-->
                                                                                            <div class="col mb-2">
                                                                                                <label for="catSelect" class="form-label">Category</label>
                                                                                                <select class="form-control" id="catSelect" name="P_CAT">
                                                                                                <option selected><?php echo $retrive_product['CAT_ID'],". ", $retrive_product['CAT_NAME']?></option>        
                                                                                                    <?php
                                                                                                        //category select
                                                                                                        $category_select = "SELECT * FROM category";
                                                                                                        $category_select_query = mysqli_query($conn, $category_select);

                                                                                                        while($category_data = mysqli_fetch_array($category_select_query))
                                                                                                        {
                                                                                                    ?>
                                                                                                    <option><?php echo $category_data['CAT_ID'],". ", $category_data['CAT_NAME']?></option>
                                                                                                    <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--harga item-->
                                                                                        <div class="mb-2">
                                                                                            <label for="exampleFormControlInput4" class="form-label">Price (In Thousand Rupiah)</label>
                                                                                            <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Price" name="P_PRICE" value="<?php echo $retrive_product['P_PRICE'];?>"required>
                                                                                        </div>
                                                                                        <!--Supplier-->
                                                                                        <div class="mb-2">
                                                                                            <label for="suppSelect" class="form-label">Supplier</label>
                                                                                            <select class="form-control" id="suppSelect" name="P_SUPP">
                                                                                                <option selected><?php echo $retrive_product['S_ID'],". ", $retrive_product['S_NAME']?></option>        
                                                                                                    <?php
                                                                                                        //supplier select
                                                                                                        $supplier_select = "SELECT * FROM supplier";
                                                                                                        $supplier_select_query = mysqli_query($conn, $supplier_select);

                                                                                                        while($supplier_data = mysqli_fetch_array($supplier_select_query))
                                                                                                        {
                                                                                                    ?>
                                                                                                    <option><?php echo $supplier_data['S_ID'],". ", $supplier_data['S_NAME']?></option>
                                                                                                    <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                </select>
                                                                                        </div>
                                                                                        <!--desc area-->
                                                                                        <div class="mb-2">
                                                                                            <label for="productdesc<?php echo $retrive_product['P_ID'];?>" class="form-label">Description</label>
                                                                                            <textarea class="form-control" id="productdesc<?php echo $retrive_product['P_ID'];?>" rows="3" cols="40" name="P_DESC"><?php echo $retrive_product['P_DESC'];?></textarea>
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
                                                                </div>
                                                            </div>

                                                            <!--Button toggle delete modal -->
                                                            <button type="button" class="btn btn-danger col mx-1 my-1 text-light" data-bs-toggle="modal" data-bs-target="#myModalDelete<?php echo $retrive_product['P_ID'];?>"><i class="far fa-trash-alt" aria-hidden="true"></i></button>

                                                            <!-- Modal for delete data-->
                                                            <div class="modal fade" id="myModalDelete<?php echo $retrive_product['P_ID'];?>" tabindex="-1" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you sure want to delete <?php echo $retrive_product['P_NAME']?></p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-warning text-dark" data-bs-dismiss="modal">Cancel</button>
                                                                            <a href="act/delete_item.act.php?item_id=<?php echo $retrive_product['P_ID'];?>" type="button" class="btn btn-danger">Yes, Delete!</a>
                                                                        </div>
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