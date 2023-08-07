<?php
    

    include_once "auth.php";
    include "menuBar.php";

    include_once "../Shared/connection.php";

    $product_name="";
    $product_price="";
    $product_description="";

    $_SESSION['product_id'] = $_GET['product_id'];

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['user_id'];

        $retrive_data = mysqli_query($conn,"select * from products where product_id=$product_id");

        $row=mysqli_fetch_assoc($retrive_data);

        $product_name=$row['product_name'];
        $product_price=$row['product_price'];
        $product_description=$row['product_description'];


    }
     

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<div class="homeContainer">
        <form class="formContainer" action="update.php" method="post" enctype="multipart/form-data">
            <div class="heading">Edit Products</div>
            <div class="text">
                <label for="product_name">Name of Product :</label>
                <input type="text" name="product_name" value="<?php echo $product_name?>">
            </div>
            <div class="number">
                <label for="product_price">Price :</label>
                <input type="number" name="product_price" value="<?php echo $product_price?>">
            </div>
            <div class="description">
                <textarea cols="45" rows="7" placeholder="Product description....." name="product_description" ><?php echo $product_description?></textarea>
            </div>
            <input type="file" name="product_image" required>
            <button class="uploadBtn">update</button>
        </form>
    </div>
    
</body>
</html>
