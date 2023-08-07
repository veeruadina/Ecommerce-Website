
<?php

    include "auth.php";
    include "menuBar.php";
    include_once "../Shared/connection.php";

    $user_id = $_SESSION['user_id'];


    $searchData = $_POST['search'];
    include  "../Shared/connection.php";
    $cursorForSearch = mysqli_query($conn,"select product_name from products ");

    $productArrray = array();
    while($row=mysqli_fetch_assoc($cursorForSearch)){
        foreach ($row as $value) {
            array_push($productArrray ,$value);
        }
        
    }

    $matchingElements = preg_grep('/' . preg_quote($searchData, '/') . '/i', $productArrray);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            padding: 0%;
            margin: 0%;
        }
        .homeItemsContainer{
            display:flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
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
            width: 150px;
            border: none;
            border-radius: 10px;
            background-color: gold;
            color: white;
        }
        .viewProductsContainer .EDcontainer{
            display: flex;
            justify-content: center;
            gap: 20px;
        }



    </style>

</head>
<body>
    <div class="homeItemsContainer">
        <?php
            foreach($matchingElements as $k => $v){
                $cursor = mysqli_query($conn,"select * from products where LOWER(product_name) = '$v' ");
                while($row = mysqli_fetch_assoc($cursor)){

                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_price = $row['product_price'];
                    $product_description = $row['product_description'];
                    $product_dest_path = $row['product_dest_path'];
            
            
                    echo "
                        <div class='viewContainer'>
                            <div class='viewProductsContainer'>
                                <div class='product_name'>$product_name</div>
                                <div class='product_price'>&#8377 $product_price</div>
                                <div class='image'><img src='$product_dest_path' alt=''></div>
                                <div class='product_description'>$product_description</div>
                                <div class='EDcontainer'>  
                                    <a href='addToCart.php?product_id=$product_id'>
                                        <Button>Add to cart</Button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        ?>
    </div>
    
    
</body>
</html>