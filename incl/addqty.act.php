<?php
    require_once "../db/db.config.php";
    SESSION_START();
    $current_date = date("Y-m-d H:i:s");


    $user_id = $_SESSION['U_ID'];
    $item_id = $_GET['additem_id'];

    $select_sql = "SELECT * FROM cart JOIN cart_container ON cart.CART_ID = cart_container.CART_ID WHERE cart.CART_STATUS = 'PENDING' AND cart.U_ID = $user_id AND P_ID = $item_id ";
    $selected_data = mysqli_fetch_array(mysqli_query($conn, $select_sql));
    
    //retrive cart_id, sum, qty
    $cart_id = $selected_data['CART_ID'];
    $prev_qty = $selected_data['P_B_QTY'];

    //define new qty & sum
    $new_qty = $prev_qty + 1;
    
    $update_sql = "UPDATE cart_container SET P_B_QTY = $new_qty, TIME_CREATED = '$current_date' WHERE CART_ID = $cart_id AND P_ID = $item_id";
    $update_query = mysqli_query($conn, $update_sql);

    header("location: ../cart.php");
?>