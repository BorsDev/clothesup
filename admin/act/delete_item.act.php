<?php
    require_once "../../db/db.config.php";
    session_start();

    $item_id = $_GET['item_id'];

    $delete_query = "DELETE FROM product WHERE P_ID = $item_id";
    $delete_sql = mysqli_query($conn, $delete_query);
    header("location: ../product_lists.php");
?>