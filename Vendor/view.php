<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            padding: 0%;
            margin: 0%;
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
        .viewProductsContainer .deleteBtn{
            margin-top: 10px;
            padding: 10px; 
            width: 80px;
            border: none;
            border-radius: 10px;
            background-color: red;
            color: whitesmoke;
        }
        .viewProductsContainer .deleteBtn:hover{
            box-shadow: 1px 1px 8px 1px red,
                 -1px -1px 8px 1px red;
            background-color: whitesmoke;
            color: red;
            cursor: pointer;
        }
        .viewProductsContainer .editBtn{
            margin-top: 10px;
            padding: 10px; 
            width: 80px;
            border: none;
            border-radius: 10px;
            background-color: yellow;
            color: black;
        }
        .viewProductsContainer .editBtn:hover{
            box-shadow: 1px 1px 8px 1px yellow,
                 -1px -1px 8px 1px yellow;
            background-color: whitesmoke;
            cursor: pointer;

        }

        .viewProductsContainer .EDcontainer{
            display: flex;
            gap: 20px;
        }



    </style>

</head>
<body>
    <script>
        function confirmDelete(product_id){
            res = confirm("Are you sure want to delete ");
            if(res){
                window.location=`delete.php?product_id=${product_id}`;
            }
        }
        function confirmEdit(product_id){
            res = confirm("Are you sure want to Edit ");
            if(res){
                window.location=`edit.php?product_id=${product_id}`;
            }
        }
    </script>
    
</body>
</html>

<?php

include "auth.php";
include "menuBar.php";
include_once "../Shared/connection.php";

$user_id = $_SESSION['user_id'];

$cursor = mysqli_query($conn,"select * from products where product_uploaded_by=$user_id");

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
                    <Button class='editBtn' onclick ='confirmEdit($product_id)'>Edit</Button>
                    <Button class='deleteBtn' onclick ='confirmDelete($product_id)'>Delete</Button>
                </div>
            </div>
        </div>
    ";
}

?>