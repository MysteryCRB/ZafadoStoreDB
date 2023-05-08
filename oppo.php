<!DOCTYPE html>
<html>
<head>
	<title>Oppo</title>
	<link rel="stylesheet" type="text/css" href="product.css">
</head>
<body>
<div class="header">
	<div class="logo">ZafadoStore</div>
	<div class="nav">
		<a href="dashboard.php">Home</a>
		<a href="contact.php">Contact</a>
	</div>
</div>
<div class="middle">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zafadostore";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM products WHERE category_id = 52";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="product-box">';
    echo '<div class="image">';
    echo '<img src="' . $row['image_name'] . '.jpg" alt="' . $row['product_name'] . '">';
    echo '</div>';
    echo '<div class="product-info">';
    echo '<h2>' . $row['product_name'] . '</h2>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>Stock: ' . $row['in_stock'] . '</p>';
    echo '<p>Price: Rp.' . $row['price'] . '</p>';
    if ($row['in_stock']) {
        echo '<a href="order.php?id=' . $row['product_id'] . '"><button>Order</button></a>';
    } else {
        echo '<button disabled>Out of Stock</button>';
    }
    echo '</div>';
    echo '</div>';
}

mysqli_close($conn);
?>
</div>

</body>
</html>