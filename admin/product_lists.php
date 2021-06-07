<?php
    session_start();
    $id= $_SESSION['ADM_ID'];
    if(!isset($id)){
        header("location: admlogin.php");
    }
    else{
        require_once "PHP/header.template.php";
        require_once "PHP/sidebar.template.php";
        require_once "PHP/product_lists.template.php";
        require_once "PHP/footer.template.php";
    }
?>