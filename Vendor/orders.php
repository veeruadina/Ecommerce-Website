<?php
    include "auth.php";
    include "menuBar.php";
    include "../Shared/connection.php";
    $user_id = $_SESSION['user_id'];
    
    $cursor = mysqli_query($conn,"select * from orders join products on orders.product_id = products.product_id where product_uploaded_by = $user_id");

    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            padding: 0%;
            margin: 0%;
        }
        .ordersContainer{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .ordersTitleContainer{
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .ordersTitle{
            font-family: cursive;
            padding: 20px;
            font-size: 32px;
            width: 90%;
        }
        .ordersMainContainer{
            display: flex;
            justify-content: center;
        }
        .ordersContainer .ordersDetailsContainer{
            position: relative;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            width: 90%;
            background-color: whitesmoke;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder{
            display: flex;
            justify-content: space-around;
            width: 100%;
            background-color: white;

        }
        .ordersContainer .ordersDetailsContainer .individualOrder .image {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .image img{
            width: 200px;
            height: 200px;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .productDetails{
            display: flex;
            flex-direction: column;
            width: 300px;
            padding: 10px;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .productDetails .productName{
            font-family: cursive;
            font-size: 32px;
            height: 30%;
            padding: 10px;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .productDetails .productDescription{
            padding: 10px;
            height: 60%;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .productDetails .productPrice{
            font-size: 26px;
            padding: 10px;
            height: 30%;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .ShippingAddressDetails{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .ShippingAddressDetails .shipping{
            font-family: cursive;
            font-weight: bold;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .orderTime{
            font-size: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: right;
            padding: 10px;
            width: 170px;

        }
        .ordersContainer .ordersDetailsContainer .individualOrder .orderTime .tickMark{
            position: absolute;
            width: 20px;
            height: 20px;
        }
        .ordersContainer .ordersDetailsContainer .individualOrder .orderTime .tickMark .tickMarkImg{
            position: relative;
            width: 20px;
            height: 20px;
        }


    </style>
    
</head>
<body>
    <div class="ordersContainer">
        <div class="ordersTitleContainer"><div class="ordersTitle">Your Orders</div></div>
        <div class="ordersMainContainer">
            <div class="ordersDetailsContainer">
                <?php

                    while($row = mysqli_fetch_assoc($cursor)){

                        $user_id_cust =  $row['user_id'];
                        $user_table = mysqli_query($conn,"select user_name from users where user_id = $user_id_cust ");
                        
                        $user_name = mysqli_fetch_assoc($user_table )['user_name'];

                        $product_dest_path = $row['product_dest_path'];
                        $product_name = $row['product_name'];
                        $product_description = $row['product_description'];
                        $product_price = $row['product_price'];
                        $order_time = $row['order_time'];
                        $shipping_address = $row['shipping_address'];

                        $addressArray = explode("^", $shipping_address);
                        
                        echo "
                            <div class='individualOrder'>
                                <div class='image'><img src='$product_dest_path' alt=''></div>
                                <div class='productDetails'>
                                    <div class='productName'>$product_name </div>
                                    <div class='productDescription'>$product_description</div>
                                    <div class='productPrice'>&#8377 $product_price</div>
                                </div>
                                <div class='ShippingAddressDetails'>
                                    <div class='shipping'>Shipping to :</div>
                                    <div class='shipping_name'>$addressArray[0] </div>
                                    <div class='shipping_dno'>$addressArray[1]</div>
                                    <div class='shipping_area'>$addressArray[2]</div>
                                    <div class='shipping_landmark'>$addressArray[3]</div>
                                    <div class='shipping_city'>$addressArray[4]</div>
                                    <div class='shipping_state'>$addressArray[5]</div>
                                    <div class='shipping_zipcode'>$addressArray[6]</div>
                                </div>
                                <div class='orderTime'>
                                    <div class='tickMark'><img class='tickMarkImg' src='../pics/orderPlaceImage.png' alt=''></div>
                                    <div class='orderPlaceOn'>Order Place On</div>
                                    <div class='productDescription'>$order_time</div> 
                                    <div class='productsUserId'>by $user_name </div>   
                                </div>
                            </div>
                        
                        ";
                    }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>