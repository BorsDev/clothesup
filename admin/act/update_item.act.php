<?php
    
    require_once "../../db/db.config.php";
    session_start();

    
    $editor_id  = $_SESSION['ADM_ID'];
    $item_id = $_GET['item_id'];
    $item_name = $_POST['P_NAME'];
    $item_brand = substr($_POST['BRAND_NAME'],0,1);
    $item_category = substr($_POST['P_CAT'],0,1);
    $item_price = $_POST['P_PRICE'];
    $item_supplier = $_POST['P_SUPP'];
    $item_desc = $_POST['P_DESC'];
    $current_date = date("Y-m-d H:i:s");

    /*echo $editor_id."</br>";
    echo $item_id ."</br>";
    echo $item_name."</br>";
    echo $item_brand."</br>";
    echo $item_category."</br>";
    echo $item_price."</br>";
    echo $item_supplier."</br>";
    echo $item_desc."</br>";
    echo $current_date."</br>";
    // SELECT ITEM PRODUCT*/


    //update sql
    $update_sql = "UPDATE product SET P_NAME = '$item_name', 
    P_PRICE = $item_price, 
    P_DESC = '$item_desc', 
    CAT_ID = $item_category, 
    BRAND_ID = $item_brand, 
    EDITED_BY_ID = $editor_id, 
    EDIT_TIME = '$current_date'
    WHERE P_ID = $item_id";
    
    $update_query = mysqli_query($conn, $update_sql);
    header("location: ../product_lists.php");
?>