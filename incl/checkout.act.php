<?php
    require_once "../db/db.config.php";
    SESSION_START();
    $current_date = date("Y-m-d H:i:s");
    $user_id = $_SESSION['U_ID'];
    $cart_id = $_GET['cart_id'];

    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $pnumber = $_POST['Pnumber'];
    $pcode = $_POST['Pcode'];
    $province = $_POST['Province'];
    $city = $_POST['City'];
    $address = $_POST['Address'];

    //input to database
    $receiver_sql = "INSERT INTO receiver (`CART_ID`,`U_ID`,`R_FNAME`,`R_LNAME`, `R_PNUMBER`, `R_POSTALCODE`,`R_PROVINCE`, `R_CITY`,`R_ADDRESS`,`CREATED_TIME`) VALUES ($cart_id, $user_id, '$fname', '$lname', '$pnumber', '$pcode', '$province', '$city', '$address', '$current_date');";
    $receiver_query = mysqli_query($conn, $receiver_sql);
    header("location: ../payment.php");
?>
