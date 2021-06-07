<?php
    require_once "../../db/db.config.php";
    session_start();

    $item_img = $_FILES['item_img'];
    $item_name = $_POST['item_name'];
    $item_brand = substr($_POST['item_brand'],0,1);
    $item_cat = substr($_POST['item_cat'],0,1);
    $item_price = $_POST['item_price'];
    $item_qty = $_POST['item_qty'];
    $item_supplier = substr($_POST['item_supplier'],0,1);
    $item_desc = $_POST['item_desc'];
    $creator_id = $_SESSION['ADM_ID'];
    $current_date = date("Y-m-d H:i:s");

    /*convert img to array
    echo "<pre>";
    print_r($item_img);
    echo "</pre>";*/ 

    //if post action is submitted
    if(isset($_POST['submit'])  &&  isset($_FILES['item_img'])){
        $img_name = $_FILES['item_img']['name'];
        $img_tmp_name = $_FILES['item_img']['tmp_name'];
        $img_error = $_FILES['item_img']['error'];
        $img_size = $_FILES['item_img']['size'];

        //if not error
        if($img_error === 0 ){
            //if file larger than 2 mb
            if($img_size > 1000000){
                $errMsg = "img_size_tl";
                header("location:../new_product.php?error=$errMsg");
            }
            // process the img
            else{
                // get file extention
                $file_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                //make extention to lower case
                $img_file_lc = strtolower($file_ext);
                $allowed_ext =array("jpg","png","jpeg");

                //if ext matches
                if(in_array($img_file_lc, $allowed_ext)){
                    //new file name
                    $new_file_name = $item_name.'.'.$img_file_lc;
                    //path .name
                    $img_upload_path = "../img/product_img/".$new_file_name;
                    //move file form temporary folder -->path
                    move_uploaded_file($img_tmp_name,$img_upload_path);

                    //upload to db
                    $upload_query = "INSERT INTO product (`P_ID`, `P_NAME`, `P_PHOTO`, `P_PRICE`, `P_QTY`, `P_DESC`, `BRAND_ID`, `CAT_ID`, `INPUT_BY_ID`, `INPUT_TIME`, `EDITED_BY_ID`, `EDIT_TIME`, `S_ID`) VALUES ('' , '$item_name', '$new_file_name', '$item_price', '$item_qty', '$item_desc', '$item_brand', '$item_cat', '$creator_id', '$current_date', '$creator_id', '$current_date', '$item_supplier')";
                    $upload_sql  = mysqli_query($conn, $upload_query);

                    header("location:../product_lists.php?error=none");
                }
                //not match
                else{
                    $errMsg = "Img_ext_err";
                    header("location:../new_product.php?error=$errMsg");
                }
            }
        }
        //else send error msg
        else{
            $errMsg = "Error_img";
            header("location:../new_product.php?error=$errMsg");
        }
    }
    else{
        $errMsg = "bypass_detected";
        header("location:../new_product.php?error=$errMsg");
    }
?>