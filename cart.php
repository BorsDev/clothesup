<?php
    require_once "./db/db.config.php";
    SESSION_START();
    $user_id = $_SESSION['U_ID'] or null;

    if(!isset($user_id)){
        header("location: index.php");
    }
    else{
        require_once "./php/header.template.php";
        require_once "./php/navbar.template.php";
        require_once "./php/cartDetail.template.php";
        require_once "./php/footer.template.php";
    }
?>