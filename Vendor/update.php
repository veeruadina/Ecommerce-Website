<?php

    include "auth.php";

    $user_id = $_SESSION['user_id'];
    $product_id = $_SESSION['product_id'];

    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_description = $_POST["product_description"];


    $file_details = $_FILES["product_image"];
    $product_image_name = $file_details["name"];

    $product_tmp_path = $file_details["tmp_name"];
    $product_dest_path = "../Shared/images/".$product_image_name;
    move_uploaded_file($product_tmp_path,$product_dest_path);


    include_once "../Shared/connection.php";

    $status = mysqli_query($conn,"update products  set product_name = '$product_name',product_price ='$product_price',product_description = '$product_description',product_dest_path = '$product_dest_path',product_uploaded_by = ' $user_id' where product_id='$product_id' ");

    if($status){
        header("location: view.php");
    }

?>