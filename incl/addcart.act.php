<?php
    require_once "../db/db.config.php";
    SESSION_START();
    $current_date = date("Y-m-d H:i:s");

    //GET PRODUCT DATA WANT TO INSERT INTO CART_CONTAINER
    $product_id = $_GET['item_id'];
    $fetch_sql = "SELECT * FROM product WHERE P_ID = '$product_id'";
    $fetch_query = mysqli_query($conn, $fetch_sql);
    $row1 = mysqli_fetch_array($fetch_query);

    //PRODUCT DATA WANT TO INSERT INTO CART_CONTAINER TABLE
    $user_id = $_SESSION["U_ID"];
    $pb_id = $row1['P_ID'];

    //CHECK LAST CART CREATED BY USER STATUS PENDING
    $check_cart = "SELECT * FROM cart WHERE U_ID = $user_id AND CART_STATUS = 'PENDING' ORDER BY CART_ID DESC LIMIT 1";
    $check_cart_querry = mysqli_query($conn,$check_cart);
    $cart_data = mysqli_fetch_array($check_cart_querry);


    //if cart with same user_id & status == 'pending' will add to current cart
    if(isset($cart_data['CART_ID']))
    {

        $cart_id = $cart_data['CART_ID'];
        $cart_container = "SELECT * FROM cart_container WHERE CART_ID = $cart_id AND P_ID = $pb_id";
        $check_container_querry = mysqli_query($conn, $cart_container);
        $check_container_data = mysqli_fetch_array($check_container_querry);

        //if the item is same
        if($check_container_data['P_ID'] === $pb_id)
        {

            $cart_item_total_qty = $check_container_data['P_B_QTY'];
            $new_item_qty = $cart_item_total_qty + 1;

            $upt_sql = "UPDATE  cart_container SET  P_B_QTY = $new_item_qty, TIME_CREATED = '$current_date'  WHERE cart_container.CART_ID = $cart_id AND P_ID = $pb_id";
            $upt_querry = mysqli_query($conn, $upt_sql);

            header("location:../cart.php");
        }

        //else different items create new container
        else
        {

            $new_container = "INSERT INTO cart_container (CART_ID, P_ID, P_B_QTY, TIME_CREATED) VALUE ('$cart_id', '$pb_id', '1', '$current_date')";
            $new_container_querry = mysqli_query($conn, $new_container);

            header("location:../cart.php");
        }
    }

    //else make a new cart if status =! 'pending'
    else
    {

        //CREATE NEW CART
        $_create_cart = "INSERT INTO cart (CART_ID, U_ID, CART_STATUS, TIME_CREATED) VALUE ('','$user_id', 'PENDING', '$current_date')";
        $_create_querry = mysqli_query($conn, $_create_cart);

        //CHECK LAST CART CREATED BY USER STATUS PENDING
        $check_cart = "SELECT * FROM cart WHERE U_ID = $user_id AND CART_STATUS = 'PENDING' ORDER BY CART_ID DESC LIMIT 1";
        $check_cart_querry = mysqli_query($conn,$check_cart);
        $cart_data = mysqli_fetch_array($check_cart_querry);
        $_cart_id = $cart_data['CART_ID'];

        //INPUT CART ITEM
        $insert_cart = "INSERT INTO cart_container (CART_ID, P_ID, P_B_QTY, P_B_SUM, TIME_CREATED) VALUE ($_cart_id, '$pb_id', 1, '$current_date')";
        $_insert_cart_querry = mysqli_query($conn, $insert_cart);
    
        header("location:../cart.php");
    }
?>