<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .userDetails{
            background-color: transparent;
            display: flex;
            justify-content: space-evenly;
            height: 20px;
        }

    </style>
</head>
<body>
    
</body>
</html>


<?php

    session_start();   

    if(!isset($_SESSION['login_status'])){
        echo "Illegal Attempt!!!";
        die;
    }
    if(!($_SESSION['login_status'])){
        echo "Unauthorized Attempt!!!";
        die;
    }
    if($_SESSION["user_type"]!="customer"){
        echo "You have no permission to access this resource.";
        die;
    }
    $user_name = $_SESSION["user_name"];
    $user_id = $_SESSION["user_id"];
    $user_type = $_SESSION["user_type"];

    // echo "<div class=\"userDetails\">
    //     <div>$user_id</div>
    //     <div>$user_name</div>
    //     <div>$user_type</div>
    // </div>";


?>