<?php
session_start();


if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "zafadostore";
  $conn = new mysqli($servername, $username, $password, $dbname);


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  if (isset($_POST['submit'])) {

    // Get form data and sanitize it
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $in_stock = mysqli_real_escape_string($conn, $_POST['in_stock']);
    $image_name = mysqli_real_escape_string($conn, $_POST["image_name"]);

    // Generate a random product ID between 1 and 100
    $product_id = rand(1, 100);

    // Insert the data into the Products table
    $sql = "INSERT INTO Products (product_id, product_name, price, category_id, description, in_stock, image_name)
            VALUES ('$product_id', '$product_name', '$price', '$category_id', '$description', '$in_stock', '$image_name')";
    if ($conn->query($sql) === TRUE) {
      echo "New product added successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $sql = "SELECT * FROM Categories";
  $result = $conn->query($sql);
?>

<html>
<head>
  <title>Zafado Products</title>
</head>
<body>
  <form method="post">
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required><br><br>
    <label for="price">Price:</label>
    <input type="number" name="price" min="0" required><br><br>
    <label for="category_id">Category:</label>
    <select name="category_id" required>
      <option value="">Select a category</option>
      <?php while($row = $result->fetch_assoc()) { ?>
        <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
      <?php } ?>
    </select><br><br>
    <label for="description">Description:</label>
    <textarea name="description"></textarea><br><br>
    <label for="in_stock">In Stock:</label>
    <input type="number" name="in_stock" min="0" required><br><br>
    <label for="image_name">Image</label>
    <input type="text" name="image_name" required><br><br>
    <button type="submit" name="submit">Add Product</button>

  </form>
  <a href="admin.php"><button>Admin</button></a>
</body>
</html>

<?php
  $conn->close();
} else {
  header('Location: index.php');
  exit();
}
?>
