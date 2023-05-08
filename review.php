<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "zafadostore";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customer_id = $_SESSION['customer_id']; 

$sql = "SELECT product_id FROM orders WHERE customer_id = '$customer_id' AND status = 'paid' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_id = $row['product_id'];
} else {
    echo "Error: No paid orders found for this customer";
    exit();
}

if(isset($_POST['rating']) && isset($_POST['review_text']) && !empty($_POST['rating']) && !empty($_POST['review_text'])) {
  $rating = $_POST['rating']; 
  $review_text = $_POST['review_text']; 
  $review_id = rand(1, 100);
  $review_date = date("Y-m-d");

  $sql = "INSERT INTO reviews (review_id, product_id, customer_id, rating, review_text, review_date)
          VALUES ('$review_id', '$product_id', '$customer_id', '$rating', '$review_text', '$review_date')";

  if ($conn->query($sql) === TRUE) {
      echo "Review added successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Submit Review</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url(background.jpg) no-repeat;
            background-size: cover;
        }
        
        table {
            margin: 50px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1), 0 5px 5px rgba(0,0,0,0.1);
        }
        
        th, td {
            text-align: center;
            padding: 12px;
        }
        
        th {
            background-color: #03a9f4;
            color: #fff;
            text-transform: uppercase;
        }
        
        tr:nth-child(even) {
            background-color: #f5f5f5;
        }
        
        form {
            display: inline-block;
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
            margin-top: 20px;
        }
        
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <table>
        <form method="post" action="">
            <tr>
                <th colspan="2">Submit Review</th>
            </tr>
            <tr>
                <td>Rating:</td>
                <td>
                    <select id="rating" name="rating">
                        <option value="">-- Select a rating --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Review:</td>
                <td>
                    <textarea id="review" name="review_text" rows="4" cols="50"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </form>
    </table>
        <div style="text-align:center">
        <a href="dashboard.php"><button>Dashboard</button></a>
        </div>
</body>
</html>

<title>Review</title>