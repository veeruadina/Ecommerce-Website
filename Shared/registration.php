<?php

    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    $encry_password = md5($password);
 
    include_once("connection.php");
    $status = mysqli_query($conn,"INSERT INTO users (user_name,password,user_type) values ('$user_name','$encry_password','$user_type')");

    if($status){
        header("location: login.html");
    }
    else{
        echo mysqli_error($sonn);
    }

    


?>