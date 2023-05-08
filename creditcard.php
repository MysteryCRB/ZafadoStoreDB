<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zafadostore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM orders WHERE status = 'unpaid'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Payment Page</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background.jpg) no-repeat;
        background-size: cover;
      }

      .login-box {
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
      }

      .login-box h2 {
        text-align: center;
        margin-bottom: 50px;
        font-size: 40px;
        font-family: Bank Gothic;
      }

      .user-box {
        position: relative;
      }

      .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
      }

      .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
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
    <div class="login-box">
      <h2>Payment</h2>
      <form action="insert_payment.php" method="post">
        <div>
          <label for="order_id">Select an order:</label>
          <select name="order_id" id="order_id">
            <?php if ($result->num_rows > 0) { ?>
              <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['order_id']; ?>">
                  Order ID: <?php echo $row['order_id']; ?> - Product Name: <?php echo $row['product_name']; ?>
                </option>
              <?php } ?>
            <?php } else { ?>
              <option>No unpaid orders.</option>
            <?php } ?>
          </select>
        </div>
        <div class="user-box">
          <input type="text" name="card_number" id="card_number" required>
          <label for="card_number">Credit Card Number</label>
        </div>
        <div class="user-box">
          <input type="text" name="cvv" id="cvv" max="3"required>
          <label for="cvv">CVV</label>
        </div>
        <div class="user-box">
          <input type="text" name="exp_date" id="exp_date"required>
          <label for="exp_date">Expiration Date</label>
        </div>
        <div class="user-box">
          <input type="text" name="card_holder" id="card_holder" required>
<label for="card_holder">Cardholder Name</label>
</div>
<button type="submit">Pay Now</button>
</form>
</div>

  </body>
</html>

<?php $conn->close(); ?>
