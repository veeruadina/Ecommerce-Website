<?php

    include "auth.php";
    $user_id = $_GET['user_id'];

    $shipping_address = $_GET['shipping_address'];

    include_once "../Shared/connection.php";
    $cartDetails = mysqli_query($conn,"select * from cart where user_id = $user_id");

    while($row = mysqli_fetch_assoc($cartDetails)){
        $product_id=$row['product_id'];
        $cursor = mysqli_query($conn,"insert into orders (product_id,user_id,shipping_address) values ($product_id,$user_id,'$shipping_address')");
    }

    $deleteCart = mysqli_query($conn,"delete from cart where user_id=$user_id");

    header("location:placeOrder.php");
?>