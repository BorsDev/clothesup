<?php
    require_once "../../db/db.config.php";
    session_start();

    $new_cat = $_POST['new_cat'];
    $creator_id = $_SESSION['ADM_ID'];
    $current_date = date("Y-m-d H:i:s");
    //search if category exist
    $search_sql = "SELECT * FROM category WHERE CAT_NAME LIKE '%$new_cat%'";
    $search_query = mysqli_query($conn, $search_sql);
    $exist_id = mysqli_fetch_array($search_query);

    if(isset($exist_id)){
        $msg='item_exist';
        header("location: ../category_lists.php");
    }
    else{
        $insert_cat_sql = "INSERT INTO category (CAT_ID, CAT_NAME, time_created, creator_id) VALUES ('', '$new_cat', '$current_date', $creator_id)";
        $insert_cat_query = mysqli_query($conn,$insert_cat_sql);
        $msg="insert_success";
        header("location: ../category_lists.php");
    }

?>