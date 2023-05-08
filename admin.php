<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ZafadoStore";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

  
  echo "<p>Welcome, (ID: ".$_SESSION['customer_id'].")</p>";

  
  echo "<a href='index.php'><button>Back to Home</button></a>";

} else {
  
  header("Location: login.php");
  exit();
}

$conn->close();
?>
<html>
  <head>
    <title>Zafado Admin</title>
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
    <h1>Add something to the tables on the Zafado database<h1>
    <h2>Customer</h2>
    <a href="register.php"><button>Register</button></a>
    <br></br>
    <h2>Category</h2>
    <a href="category.php"><button>Category</button></a>
    <h2>Inventory</h2>
    <a href="inventory.php"><button>Inventory</button></a>
    <br></br>
    <h2>Order</h2>
    <a href="order.php"><button>Order</button></a>
    <h2>Payment</h2>
    <a href="payment.php"><button>Payment</button></a>
    <br></br>
    <h2>Product</h2>
    <a href="product.php"><button>Product</button></a>
    <h2>Review</h2>
    <a href="review.php"><button>Review</button></a>
    <h2>Dashboard</h2>
    <a href="dashboard.php"><button>Dashboard</button></a>
  </body>
</html>
