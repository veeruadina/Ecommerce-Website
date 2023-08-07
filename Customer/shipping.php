<?php
include "auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Payment Details</title>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Arimo');

    * {
      padding: 0%;
      margin: 0%;
    }

    .bodyContainer {
      display: flex;
      justify-content: center;
      font-family: "Arimo", sans-serif;
      background-color: #fff;
      padding: 20px;
      height: auto;
    }

    .wrapper {
      width: 60%;
      height: auto;
      margin: 5% auto;
      background-color: #fff;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      animation: slideUp 500ms ease;
    }

    @keyframes slideUp {
      0% {
        transform: translateY(20px);
        opacity: 0;
      }

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .container {
      padding: 20px;
    }
    .container form{
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    h1 {
      display: flex;
      align-items: center;
      font-size: 24px;
      color: #4a3b76;
      margin-bottom: 20px;
    }

    h1 i {
      margin-right: 10px;
    }

    label {
      padding-left: 5px ;
      display: block;
      font-size: 14px;
      color: #4a3b76;
      margin-bottom: 5px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    .name,
    .street,
    .area,
    .landmark {
      width: 95%;
    }

    .address-info {
      width: 90%;
      display: flex;
      justify-content: space-between;
    }

    .btns {
      text-align: center;
      margin-top: 20px;
    }

    button {
      padding: 12px 20px;
      background-color: #4a3b76;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #6c5ca9;
    }

    input:focus,
    button:focus {
      outline: none;
    }
  </style>
</head>

<body>
  <div class="bodyContainer">
    <div class="wrapper">
      <div class="container">
        <form action="payment.php?user_id=<?php echo $_GET['user_id'] ?>" method="post">
          <h1>
            <i class="fas fa-shipping-fast"></i>
            Shipping Details
          </h1>
          <div class="name">
            <div>
              <label for="f-name">Name</label>
              <input required type="text" name="shipping_name" placeholder="Enter your name">
            </div>
          </div>
          <div class="street">
            <label for="name">H.No</label>
            <input required type="text" name="shipping_dno" placeholder="Enter your H.No">
          </div>
          <div class="area">
            <label for="name">Area</label>
            <input required type="text" name="shipping_area" placeholder="Enter your Area">
          </div>
          <div class="landmark">
            <label for="name">Landmark</label>
            <input required type="text" name="shipping_landmark" placeholder="Enter any landmark">
          </div>
          <div class="address-info">
            <div>
              <label for="city">City</label>
              <input required type="text" name="shipping_city" placeholder="Ex:Hyderabad">
            </div>
            <div>
              <label for="state">State</label>
              <input required type="text" name="shipping_state" placeholder="Ex:Telangana ">
            </div>
            <div>
              <label for="zip">Zip</label>
              <input required type="text" name="shipping_zip" placeholder="000000">
            </div>
          </div>
          <div class="btns">
            <button>Proceed to pay</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>