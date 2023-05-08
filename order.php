<?php
// Get the product ID from the query string
$product_id = $_GET['id'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zafadostore";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the product information from the database
$sql = "SELECT * FROM products WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

// Check for query errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Get the product data
$product_data = mysqli_fetch_assoc($result);
$product_name = $product_data['product_name'];
$price = $product_data['price'];
$in_stock = $product_data['in_stock'];
$image_name = $product_data['image_name'];
$order_id = rand(1, 100);
// Get the customer ID if logged in, otherwise set to 0
session_start();
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
} else {
    header("Location: login.php");
}

// Get the customer's shipping address from the database
$address_sql = "SELECT address FROM customers WHERE customer_id = $customer_id";
$address_result = mysqli_query($conn, $address_sql);

// Check for query errors
if (!$address_result) {
    die("Query failed: " . mysqli_error($conn));
}

// Get the shipping address data
$address_data = mysqli_fetch_assoc($address_result);
$shipping_address = $address_data['address'];

// Get the order total from user input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_total = $_POST['order_total'];

    // Check if the order can be fulfilled based on the available stock
    if ($in_stock >= $order_total) {

        // Decrease the in_stock value by the amount ordered
        $new_stock = $in_stock - $order_total;

        // Update the product in the database
        $update_sql = "UPDATE products SET in_stock = $new_stock WHERE product_id = $product_id";
        $update_result = mysqli_query($conn, $update_sql);

        // Check for query errors
        if (!$update_result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Insert the new order into the orders table
        $status = "unpaid";
		$order_date = date('Y-m-d H:i:s');
		$insert_sql = "INSERT INTO orders (order_id, customer_id, product_id, product_name, order_total, order_date, status, shipping_address) VALUES ($order_id, $customer_id, $product_id, '$product_name', $order_total, '$order_date', '$status', '$shipping_address')";
		$insert_result = mysqli_query($conn, $insert_sql);
		
		// Check for query errors
		if (!$insert_result) {
			die("Query failed: " . mysqli_error($conn));
		}
        
        header("Location: payment.php?order_total=$order_total&shipping_address=".urlencode($shipping_address));
        exit();
    } else {
        
        $error_message = "Sorry, the order cannot be fulfilled because there is not enough stock available.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background.jpg) no-repeat;
        background-size: cover;
      }
      
      .container {
        width: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-align: center;
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
    <div class="container">
      <h1>Order Confirmation</h1>
	  <h2>Order Details:</h2>
<p>Product ID: <?php echo $product_id; ?></p>
<p>Product Name: <?php echo $product_name; ?></p>

      <?php if (isset($error_message)) { ?>
        <p><?= $error_message ?></p>
      <?php } ?>
      <form method="post">
        <div class="user-box">
          <input type="number" id="order_total" name="order_total" min="1" max="100" required>
          <label for="order_total">Order Total:</label>
        </div>
        <br><br>
        <div class="user-box">
          <select id="shipping_address" name="shipping_address" required>
            <?php
           
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "zafadostore";
              $conn = mysqli_connect($servername, $username, $password, $dbname);

              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }
			  $customer_id = $_SESSION['customer_id'];
			$sql = "SELECT address FROM customers WHERE customer_id = $customer_id";
		$result = mysqli_query($conn, $sql);	
		         
				  if (!$result) {
					die("Query failed: " . mysqli_error($conn));
				  }
		
				  
				  $address = mysqli_fetch_assoc($result)['address'];
				  echo "<option value='$address'>$address</option>";
		
				  mysqli_close($conn);
				?>
			  </select>
			  <label for="shipping_address">Shipping Address:</label>
			</div>
			<br><br>
			<input type="submit" value="Continue" class="btn">
		  </form>
		  <br>
		  <a href="javascript:history.back()" class="btn-back">Back</a>
		</div>
	</body>
</html>					