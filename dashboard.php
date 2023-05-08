<?php
session_start();
include 'val.php';

if (!isset($_SESSION['customer_id'])) {
  header("Location: index.php");
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ZafadoStore";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$customer_id = $_SESSION['customer_id'];
$sql = "SELECT * FROM Customers WHERE customer_id='$customer_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Zafado Store</title>
	<style>
       body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background.jpg) no-repeat;
        background-size: cover;
      }

      .header {
			background-color: #1f1f1f;
			height: 50px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 50px;
		}
		.logo {
			color: white;
			font-size: 24px;
			font-weight: bold;
		}
		.nav {
			display: flex;
			align-items: center;
		}
		.nav a {
			color: white;
			margin: 0 20px;
			text-decoration: none;
			font-size: 18px;
			font-weight: bold;
		}

      table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
        text-align: left;
      }

      th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        color: #fff;
      }
      
      p {
        text-align: center;
      }

      th {
        background-color: #333;
      }

      form {
        text-align: center;
        margin-top: 20px;
      }

      input[type="submit"] {
        background: transparent;
        border: none;
        outline: none;
        color: #fff;
        background: #03a9f4;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
      }
      
      h2.wauw {
  text-align: center;
}

      .image {
        text-align: center;
        margin-top: 50px;
      }
      
      .image img {
        width: 300px;
        height: 300px;
        border-radius: 5px;
      }
      
      .product-info {
        text-align: center;
        margin-top: 20px;
      }
      
      .product-info h2 {
        color: #fff;
        font-size: 24px;
        margin-bottom: 10px;
      }
      
      .product-info p {
        color: #fff;
        font-size: 18px;
        margin-bottom: 20px;
      }
      
      .product-info button {
        background: transparent;
        border: none;
        outline: none;
        color: #fff;
        background: #03a9f4;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
      }

      .product-box {
  display: inline-block;
  width: 30%;
  margin: 20px;
}

.left {
  float: left;
}

.right {
  float: right;
}

.middle {
  margin: 0 auto;
}

    </style>
</head>
<body>
<div class="header">
		<div class="logo">Zafado Store</div>
		<nav class="nav">
			<a href="contact.php">Contact Us</a>
      <a href="members.php">Members</a>
      <a href="view.php">Review</a>
      <a href="cancel.php">Cart</a>
		</nav>
	</div>
  <strong>
    <h2 class="wauw">Account information</h2>
  </strong>
	<table>
        <tr>
            <th>ID:</th>
            <td><?php echo $customer_id; ?></td>
		<tr>
			<th>First Name:</th>
			<td><?php echo $first_name; ?></td>
		</tr>
		<tr>
			<th>Last Name:</th>
			<td><?php echo $last_name; ?></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<th>Phone:</th>
			<td><?php echo $phone; ?></td>
		</tr>
		<tr>
			<th>Address:</th>
			<td><?php echo $address; ?></td>
		</tr>
	</table>
	<form method="post" action="index.php">
		<input type="submit" value="Logout">
	</form>
  
  <strong>
    <h2 class="wauw">Please choose any of these below to start purchase!</h2>
  </strong>

  <div class="product-box left">
  <div class="image">
    <img src="laptop.jpg" alt="Product Image">
  </div>
  <div class="product-info">
    <h2>Laptops</h2>
    <p>Best Laptops you can use to gaming or work purposes!</p>
    <a href="laptop.php"><button>More information</button></a>
  </div>
</div>

<div class="product-box middle">
  <div class="image">
    <img src="mobilephone.jpg" alt="Product Image">
  </div>
  <div class="product-info">
    <h2>Mobile Phones</h2>
    <p>A great technology that is light, and can be used anywhere!</p>
    <a href="phones.php"><button>More information</button></a>
  </div>
</div>

<div class="product-box right">
  <div class="image">
    <img src="computer.jpg" alt="Product Image">
  </div>
  <div class="product-info">
    <h2>Computers</h2>
    <p>If you like to work at home, this is the best option!</p>
    <a href="computer.php"><button>More information</button></a>
  </div>
</div>

</body>
</html>