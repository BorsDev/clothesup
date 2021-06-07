<?php
    require_once "../db/db.config.php";
    SESSION_START();


    $user_id = $_SESSION['U_ID'];
    $item_id = $_GET['delitem_id'];

    $select_sql = "SELECT * FROM cart JOIN cart_container ON cart.CART_ID = cart_container.CART_ID WHERE cart.CART_STATUS = 'PENDING' AND cart.U_ID = $user_id";
    $selected_data = mysqli_fetch_array(mysqli_query($conn, $select_sql));
    
    //retrive cart_id
    $cart_id = $selected_data['CART_ID'];
    
    $delete_sql = "DELETE FROM `cart_container` WHERE CART_ID = $cart_id and P_ID = $item_id";
    $delete_query = mysqli_query($conn, $delete_sql);

    header("location:../cart.php");
?>