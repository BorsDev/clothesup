<?php
    require_once "../../db/db.config.php";
    session_start();

    $item_id = $_GET['item_id'];
    $res_qty = $_POST['res_qty'];

    $check_sql = "SELECT * FROM product WHERE P_ID = $item_id";
    $check_query = mysqli_query($conn, $check_sql);
    $data = mysqli_fetch_array($check_query);

    $old_qty =$data['P_QTY'];
    $new_qty = $old_qty + $res_qty;

    $res_sql = "UPDATE product SET P_QTY = $new_qty WHERE P_ID = $item_id";
    $res_query = mysqli_query($conn,$res_sql);
    header("location: ../product_lists.php");
?>