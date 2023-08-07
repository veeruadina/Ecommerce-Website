<?php

include "auth.php";

$shipping_name = $_POST['shipping_name'];
$shipping_dno = $_POST['shipping_dno'];
$shipping_area = $_POST['shipping_area'];
$shipping_landmark = $_POST['shipping_landmark'];
$shipping_city = $_POST['shipping_city'];
$shipping_state = $_POST['shipping_state'];
$shipping_zip = $_POST['shipping_zip'];


$shipping_address = $shipping_name . "^" . $shipping_dno . "^" . $shipping_area . "^" . $shipping_landmark . "^" . $shipping_city . "^" . $shipping_state . "^" . $shipping_zip;

// $addressArray = explode("^", $shipping_address);

?>

<!DOCTYPE html>
<html lang="en">
<style>
  *{
    padding: 0;
    margin: 0;
  }
  .bodyContainer {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
  }

  .payment-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    padding: 20px;
    max-width: 400px;
    width: 100%;
  }

  h2 {
    text-align: center;
  }

  .payment-options {
    width: 100%;
    height: 170px;
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  .payment-options .firstRow {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
  }

  .payment-options .secondRow {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
  }

  .payment-options img {
    width: 100px;
    height: 50px;
    cursor: pointer;
  }

  .payment-options #cod {
    background-image: url("../pics/cod.png");
  }


  label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  input[type="radio"] {
    display: none;
  }

  input[type="radio"]:checked+img {
    border-radius: 10px;
    border: 2px solid red;
  }
  input[type="radio"]:checked+#cod {
    border-radius: 10px;
    border: 2px solid green;

  }

  .btn {
    display: flex;
    justify-content: center;
  }

  button {
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #0056b3;
  }

  button:focus {
    outline: none;
  }

  /* Add a box-shadow to give the button a raised effect when clicked */
  button:active {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }
</style>

<head>
  <title>Payment Gateway</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="bodyContainer">
    <div class="payment-container">
      <h2>Select Payment Method</h2>
      <div class="payment-options">
        <div class="firstRow">
          <label for="paytm">
            <input type="radio" id="paytm" name="payment" value="paytm">
            <img src="../pics/paytm-logo.jpg" alt="Paytm">
          </label>
          <label for="phonepay">
            <input type="radio" id="phonepay" name="payment" value="phonepay">
            <img src="../pics/phonePay.png" alt="PhonePe">
          </label>
        </div>
        <div class="secondRow">
          <label for="gpay">
            <input type="radio" id="gpay" name="payment" value="gpay">
            <img src="../pics/gpay-logo.jpg" alt="Google Pay">
          </label>
          <label for="cash-on-delivery">
            <input type="radio" id="cash-on-delivery" name="payment" value="cash on delivery">
            <img id="cod" src="../pics/cod.png" alt="Cash On Delivery">
          </label>
        </div>
      </div>
      <div class="btn"><button id="submit-btn">Submit</button></div>
    </div>
  </div>

  <script>
    const submitButton = document.getElementById("submit-btn");
    submitButton.addEventListener("click", checkPaymentMethod);

    function checkPaymentMethod() {
      const selectedPayment = document.querySelector('input[name="payment"]:checked').value;

      if (selectedPayment === "paytm" || selectedPayment === "phonepay" || selectedPayment === "gpay") {
        alert("Warning: Currently not available.");
      } else {
        alert("Payment method selected: " + selectedPayment);
        placeOrder();

      }
    }

    function placeOrder() {
      var user_id = <?php echo $_GET['user_id']; ?>;
      var shipping_address = '<?php echo $shipping_address; ?>';

      res = confirm("Are you sure want to Place Order ");
      if (res) {
        window.location = `ordersTable.php?user_id=${encodeURIComponent(user_id)}&shipping_address=${encodeURIComponent(shipping_address)}`;
      }
    }
  </script>
</body>

</html>