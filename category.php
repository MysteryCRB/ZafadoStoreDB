<?php
session_start();


if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

  if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $parent_category_id = rand(1, 100);
    $category_id = rand(1, 100);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zafadostore";

  
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

  
    $sql = "INSERT INTO Categories (category_id, category_name, description, parent_category_id)
            VALUES ('$category_id', '$category_name', '$description', '$parent_category_id')";
    if ($conn->query($sql) === TRUE) {
      echo "Category added successfully";
    } else {
      echo "Error adding category: " . $conn->error;
    }

    $conn->close();
  }

?>
<title>Zafado Category</title>
<form method="post">
  <label for="category_name">Category Name:</label>
  <input type="text" name="category_name" required><br><br>
  <label for="description">Description:</label>
  <textarea name="description"></textarea><br><br>
  <button type="submit" name="add_category">Add Category</button>
</form>
<a href="admin.php"><button>Admin</button></a>

<?php
} else {
  header("Location: login.php");
  exit();
}
?>