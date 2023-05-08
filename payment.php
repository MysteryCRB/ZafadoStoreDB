<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background.jpg) no-repeat;
        background-size: cover;
      }
      .container {
    width: 600px;
    margin: 0 auto;
    text-align: center;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-sizing: border-box;
    transform: translateY(50%);
    clip-path: polygon(0 10%, 100% 0, 100% 90%, 0 100%);
  }

  .container h1 {
    margin-bottom: 50px;
  }

  .user-box {
    position: relative;
  }

  .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #333;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #333;
    outline: none;
    background: transparent;
  }

  .user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #333;
    pointer-events: none;
    transition: 0.5s;
  }

  .user-box input:focus ~ label,
  .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #03a9f4;
    font-size: 12px;
  }

  button {
    background: transparent;
    border: none;
    outline: none;
    color: #fff;
    background: #03a9f4;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
  }
</style>
</head>
<body>
    <div class="container">
        <h1>Payment</h1>
        <p>Your order has been placed. Please select a payment method, or cancel the order.</p>
        <div>
            <a href="comingsoon.php?order_id=[order_id]"><button>Cash</button></a>
            <span style="padding: 0 10px;">or</span>
            <a href="creditcard.php?order_id=[order_id]"><button>Credit Card</button></a>
        </div>
        <p style="margin-top: 20px;">
            <a href="cancel.php?order_id=[order_id]"><button>Cancel Order</button></a>
        </p>
    </div>
</body>
</html>


