<?php
    require_once "./db/db.config.php";
    SESSION_START();
    $username = $_SESSION['U_NAME'] or null;

    if(!isset($username)){
        header("location: index.php");
    }
    else{
        require_once "./php/header.template.php";
        require_once "./php/navbar.template.php";
        require_once "./php/checkout.template.php";
        require_once "./php/footer.template.php";
    }
?>