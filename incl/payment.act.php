<?php
    require_once "../db/db.config.php";
    SESSION_START();
    $uid = $_SESSION['U_ID'];
    $cart_id = 6;
    $current_date = date("Y-m-d H:i:s");
    $insert_date = date("Y-m-d");

    $r_Fname = $_POST['Fname'];
    $r_Lname = $_POST['Lname'];
    $r_email = $_POST['email'];
    $r_Pnumber = $_POST['Pnumber'];
    $r_Pcode = $_POST['PCode'];
    $r_Province = $_POST['Province'];
    $r_City = $_POST['City'];
    $r_Address = $_POST['Address'];

    //img data
    $P_attach = $_FILES['item_img'];
    $img_name = $P_attach['name'];
    $img_tmp_name = $P_attach['tmp_name'];
    $img_error = $P_attach['error'];
    $img_size = $P_attach['size'];

    //echo
    echo $r_Fname, "</br>";
    echo $r_Lname, "</br>";
    echo $r_email, "</br>";
    echo $r_Pnumber, "</br>";
    echo $r_Pcode, "</br>";
    echo $r_Province, "</br>";
    echo $r_City, "</br>";
    echo $r_Address, "</br>";
    echo $img_name, "</br>";
    echo $img_tmp_name, "</br>";
    echo $img_error, "</br>";
    echo $img_size, "</br>";

    //mau masukin ke database reciever dlu atau img langsung
    //lalu format_nama di databasenya apa cuy
    //insert ke receiver database
    $r_sql = "INSERT INTO receiver (`R_FNAME`,`R_LNAME`,`R_EMAIL`, `R_PNUMBER`,`R_POSTALCODE`,`R_PROVINCE`,`R_CITY`,`R_ADDRESS`,`CREATED_TIME`) VALUES ('$r_Fname', '$r_Lname', '$r_email', '$r_Pnumber', '$r_Pcode', '$r_Province', '$r_City', '$r_Address', '$current_date');";
    if (mysqli_query($conn, $r_sql)) {
        $r_id = mysqli_insert_id($conn);
        if(isset($r_id)){
            $p_sql = "INSERT INTO payment (``,``,``,``,``,``,``,) VALUES ();";
        }
        else{
            $e_msg = "ukn";
            header("location: ../checkOut.php?er=$e_msg");
        }
    }
    else{
        echo "Error: ".mysqli_error($conn);
    }
?>