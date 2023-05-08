<?php


$host = "localhost";
$username = "root";
$password = "";
$database = "zafadostore";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$order_id = $_POST['order_id'];
$sql = "SELECT price FROM products WHERE product_id = (SELECT product_id FROM orders WHERE order_id = $order_id)";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $payment_amount = $row['price'];
} else {
  echo "Error: Order not found";
  exit();
}


$payment_id = rand(1, 100);
$transaction_id = rand(1, 100);


$sql = "INSERT INTO payments (payment_id, order_id, payment_date, payment_amount, payment_method, transaction_id) 
        VALUES ('$payment_id', '$order_id', NOW(), '$payment_amount', 'Credit Card', '$transaction_id');";
$sql .= "UPDATE orders SET status = 'paid' WHERE order_id = $order_id;";

if ($conn->multi_query($sql) === TRUE) {

  header("Location: loading.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
