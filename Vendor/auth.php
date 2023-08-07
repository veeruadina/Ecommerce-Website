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
    if($_SESSION["user_type"]!="vendor"){
        echo "You have no permission to access this resource.";
        die;
    }


?>