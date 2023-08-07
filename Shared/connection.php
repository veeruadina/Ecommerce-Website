<?php

    $conn =new mysqli("localhost","root","","e-com_web");
    if($conn->connect_error){
        echo "Error in database connection!!";
        die;
    }
?>