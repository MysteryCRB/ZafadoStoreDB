<!DOCTYPE html>
<html>
<head>
	<title>Members</title>
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


$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}


while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="product-box">';
    echo '<div class="image">';
    echo '<img src="' . $row['pfp'] . '.jpg" alt="' . $row['names'] . '">';
    echo '</div>';
    echo '<div class="product-info">';
    echo '<h2>' . $row['names'] . '</h2>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<a href="contact.php"><button>Contact</button></a>';
    
    echo '</div>';
    echo '</div>';
}


mysqli_close($conn);
?>
</div>

</body>
</html>