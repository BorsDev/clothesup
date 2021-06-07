<?php

    require_once "../../db/db.config.php";
    session_start();

    $cat_id = $_GET['cat_id'];
    $cat_new_name = $_POST['up_cat'];
    
    $update_sql = "UPDATE category SET CAT_NAME='$cat_new_name' WHERE CAT_ID = $cat_id ";
    $update_query = mysqli_query($conn, $update_sql);
    header("location: ../category_lists.php");
?>