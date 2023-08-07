
<?php 
  $user_name =  $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .menuContainer{
            font-family: cursive;
            padding: 10px;
            position: relative;
            background-color: skyblue;
            color: whitesmoke;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            height: 30px;
        }

        .menuContainer button{
            font-family: cursive;
            padding: 5px;
            width: auto;
            border-radius: 5px;
            height: 30px;
            border: none;
            background-color: transparent;
        }
        .menuContainer button:hover{
            background-color: whitesmoke;
            cursor: pointer;
        }
        .menuContainer .logout{
            display: flex;
            width: 130px;
            justify-content: space-between;
        }
        .menuContainer .logoutbtn{
            background-color: red;
        }
        .menuContainer .logoutbtn:hover{
            box-shadow: 1px 1px 10px 2px red,
                 -1px -1px 10px 2px red;
        }
        .menuContainer .searchBarContainer {
            display: flex;
            justify-content: space-around;
            width: 350px;
        }
        .menuContainer .searchBarContainer #searchId {
            width: 280px;
            height: 20px;
            padding: 5px;
            border-radius :10px; 
            border: none;
        }
        .menuContainer .searchBarContainer .btnContainer{
            width: 25px;
            height: 25x;
        }
        .menuContainer .searchBarContainer .searchBtn{
            width: 30px;
            height: 20x;
            border: none;
            background-color: transparent;
            background-image: url(../pics/search.png);
            background-size: cover;
            background-position: center;
        }
        .menuContainer .searchBarContainer .searchBtn:hover{
            background-color: whitesmoke;
            border-radius: 100% ;
        }
    </style>
</head>
<body>
    <div class="menuContainer">
        <div>
            <a href="home.php"><button class="menubtn">Home</button></a>
            <a href="viewCart.php"><button class="menubtn">Cart</button></a>
            <a href="orders.php"><button class="menubtn">Orders</button></a>

        </div>
        <div class="searchContainer">
            <form action="search.php" method="POST">
                <div class="searchBarContainer">
                    <input id="searchId" type="text" name="search" placeholder="search here...">
                    <div class="btnContainer"><button class="searchBtn"></button></div>
                </div>
            </form>
        </div>
        
        <div class="logout">
            <div class="userNameDisplay">
                <?php echo"$user_name";?>
            </div>
            <a href="../Shared/logout.php">
                <button class="logoutbtn">Logout</button>
            </a>
        </div>
    </div>
</body>
</html>