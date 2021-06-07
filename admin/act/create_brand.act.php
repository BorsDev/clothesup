<?php
    require_once "../../db/db.config.php";
    session_start();

    $new_brand = $_POST['new_brand'];
    $creator_id = $_SESSION['ADM_ID'];
    $current_date = date("Y-m-d H:i:s");
    //search if brand exist
    $search_sql = "SELECT * FROM brand WHERE BRAND_NAME LIKE '%$new_brand%'";
    $search_query = mysqli_query($conn, $search_sql);
    $exist_id = mysqli_fetch_array($search_query);

    if(isset($exist_id)){
        $msg='brand_exist';
        header("location: ../brand_lists.php");
    }
    else{
        $insert_brand_sql = "INSERT INTO brand (BRAND_ID, BRAND_NAME, TIME_CREATED, create_id) VALUES ('', '$new_brand', '$current_date', $creator_id)";
        $insert_brand_query = mysqli_query($conn,$insert_brand_sql);
        $msg="insert_success";
        header("location: ../brand_lists.php");
    }

?>