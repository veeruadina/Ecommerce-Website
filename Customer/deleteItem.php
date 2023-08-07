<?php

    include "auth.php";
    $cart_id = $_GET['cart_id'];

    include_once "../Shared/connection.php";
    $status=mysqli_query($conn,"delete from cart where cart_id=$cart_id");
    if($status){
        header("location:viewCart.php");
    }
    else{
        echo mysqli_error($conn);
    }
?>