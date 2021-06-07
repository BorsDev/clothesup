<?php

    require_once "../../db/db.config.php";
    session_start();

    $brand_id = $_GET['brand_id'];
    $brand_new_name = $_POST['up_brand'];

    $update_sql = "UPDATE brand SET BRAND_NAME='$brand_new_name' WHERE BRAND_ID = $brand_id ";
    $update_query = mysqli_query($conn, $update_sql);
    header("location: ../brand_lists.php");
?>