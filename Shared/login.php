<?php

    session_start();
    $_SESSION['login_status']=false;

    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $encry_password = md5($password);

    // connecting to database
    include_once("connection.php");
    $cursor = mysqli_query($conn,"SELECT * FROM users where user_name='$user_name' && password='$encry_password'");

    $count_no_of_rows = mysqli_num_rows($cursor);

    if($count_no_of_rows==0){
        echo "User Not Found";
    }
    else{
        $row_data = mysqli_fetch_assoc($cursor);
        $user_type = $row_data["user_type"];
        $user_name = $row_data["user_name"];
        $user_id = $row_data["user_id"];

        if($user_type=="customer"){
            $_SESSION['login_status']=true;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["user_name"] = $user_name;
            
            header("location:../Customer/home.php");
        }
        elseif($user_type=="vendor"){
            $_SESSION['login_status']=true;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["user_name"] = $user_name;

            header("location:../Vendor/home.php");
        }elseif($user_type=="admin"){
            $_SESSION['login_status']=true;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["user_name"] = $user_name;

            echo "admin...";
        }
    }

    


?>