<?php
    include "auth.php";
    $product_id = $_GET['product_id'];

    include_once "../Shared/connection.php";
    $status=mysqli_query($conn,"delete from products where product_id=$product_id");
    if($status){
        header("location:view.php");
    }
    else{
        echo mysqli_error($conn);
    }
?>