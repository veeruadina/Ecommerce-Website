<?php

    include "auth.php";
    $user_id = $_SESSION['user_id'];
    $product_id = $_GET['product_id'];

    include_once "../Shared/connection.php";

    $status=mysqli_query($conn,"insert into cart(product_id,user_id) values ($product_id,$user_id)");
    if($status){
        header("location:home.php");
    }else{
        echo "mysqli_error($conn)";
    }


?>
