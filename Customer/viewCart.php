
<?php


    include "auth.php";
    include "menuBar.php";
    $user_id = $_SESSION['user_id'];


    include_once "../Shared/connection.php";

    $cursor=mysqli_query($conn,"select * from cart join products on cart.product_id=products.product_id where user_id=$user_id");

    $totalCartValue = 0;



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            padding: 0%;
            margin: 0%;
        }
        .wholeContainer{
            position: relative;
            display: flex;
            width: 100%;
            height: 100vh;
        }
        .cartItems{
            width: 65%;
        }
        .priceValues{
            padding: 10px;
            position: relative;
            width: 35%;
        }
        
        .viewContainer{
            padding: 10px;
            display: inline-block;
            
        }
        .viewProductsContainer{
            margin: 2px;
            border: 2px solid red;
            border-radius: 10px;
            padding: 10px;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 5px;
            width:350px;
            height: auto;
        }
        .viewProductsContainer .product_name{
            font-size: 28px;
            color: black;
        }
        .viewProductsContainer .product_price{
            font-size: 20px;
            color: black;
        }
        .viewProductsContainer .image{
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .viewProductsContainer .image img{
            position: relative;
            width: 150px;
            height: 150px;
        }
        .viewProductsContainer button{
            margin-top: 10px;
            padding: 10px; 
            width: 120px;
            border: none;
            border-radius: 10px;
            background-color: red;
            color: white;
        }
        .viewProductsContainer button:hover{
            box-shadow: 1px 1px 8px 1px red,
                 -1px -1px 8px 1px red;
            background-color: whitesmoke;
            color: red;
            cursor: pointer;
        }
        .viewProductsContainer .EDcontainer{
            display: flex;
            gap: 20px;
        }
        .cartCont{
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .cartItemsDisplay, .totalCartValueContainer{
            margin: 1px;
            border: 2px solid black ;
            background-color: #F7FFE5;
            padding: 10px;
            width: 400px;
            display: flex;
            justify-content: space-between;
        }
        .totalCartValueContainer{
            background-color: green;
            opacity: 0.8;
        }
        .placeOrderbtn{
            margin-top: 20px;
            border: none;
            width: 150px;
            padding: 10px;
            border-radius: 10px;
            background-color: goldenrod;
            color: white;
        }
        .placeOrderbtn:hover{
            box-shadow: 1px 1px 8px 1px goldenrod,
                 -1px -1px 8px 1px goldenrod;
            background-color: whitesmoke;
            color: black;
            cursor: pointer;
        }

    </style>
    
</head>
<body>
    <div class="wholeContainer">
        <div class="cartItems">
            <?php
                while($row = mysqli_fetch_assoc($cursor)){

                    $cart_id = $row['cart_id'];
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_price = $row['product_price'];
                    $product_description = $row['product_description'];
                    $product_dest_path = $row['product_dest_path'];
                
                    $totalCartValue+=$product_price;
                
                    echo "
                        <div class='viewContainer'>
                            <div class='viewProductsContainer'>
                                <div class='product_name'>$product_name</div>
                                <div class='product_price'>&#8377 $product_price</div>
                                <div class='image'><img src='$product_dest_path' alt=''></div>
                                <div class='product_description'>$product_description</div>
                                <div class='EDcontainer'>  
                                    <Button  onclick ='confirmDelete($cart_id)'>Delete item</Button>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>

        </div>
        <div class="priceValues">
            <?php
                $c=mysqli_query($conn,"select * from cart join products on cart.product_id=products.product_id where user_id=$user_id");
                while($r = mysqli_fetch_assoc($c)){
                    $product_name = $r['product_name'];
                    $product_price = $r['product_price'];
                    echo "
                        <div class='cartCont'>
                            <div class='cartItemsDisplay'>
                                <div class='product_name'>$product_name</div>
                                <div class='product_price'>&#8377 $product_price</div>
                            </div>
                        </div>
                    ";
                }
                echo "
                    <div class='cartCont'>
                        <div class='totalCartValueContainer'>
                            <div class='totalCartValue'>Total price </div>
                            <div class='totalCartValue'>&#8377 $totalCartValue</div>
                        </div>
                    </div>
                    
                ";
            
                echo "
                    <div class='cartCont'>
                        <div class='placeOrder'>
                            <Button  onclick ='placeOrder($user_id)' class='placeOrderbtn'>Place Order</Button>
                        </div>
                    </div>
                    
                ";

            ?>

        </div>
    </div>

    <script>
        function confirmDelete(cart_id){
            res = confirm("Are you sure want to delete ");
            if(res){
                window.location=`deleteItem.php?cart_id=${cart_id}`;
            }
        }

        function placeOrder(user_id){
            res = confirm("Are you sure want to Proceed");
            if(res){
                window.location=`shipping.php?user_id=${user_id}`;
            }
        }
    </script>
    
</body>
</html>

