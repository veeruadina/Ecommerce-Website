<?php
    include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            padding : 0%;
            margin: 0%;
            background-color: whitesmoke;
        }
        .orderPageContainer{
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
        }
        .orderContainer{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .imageContainer{
            display: flex;
            justify-content: center;
        }
        .imageContainer img{
            width: 100px;
            height: 100px;
        }
        .textContainer{
            padding: 10px;
            border: 10px;
            font-size: 26px;
        }
        .continueShop{
            display: flex;
            justify-content: space-around;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
    echo "
        <div class='orderPageContainer'>
            <div class='orderContainer'>
                <div class='imageContainer'><img src='../pics/orderPlaceImage.png' alt=''></div>
                <div class='textContainer'>Order Placed successfully</div>
                <div class='continueShop'>
                    <a href='home.php'>Continue Shopping </a>
                    <a href='orders.php'>Go to orders</a>
                </div>
            </div>
        </div>
    ";
?>