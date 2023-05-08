<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ZafadoStore";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM Customers WHERE email='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "Error: Email already registered";
  } else {
    $customer_id = rand(1, 1000);

    $sql = "INSERT INTO Customers (customer_id, first_name, last_name, email, phone, address, password)
            VALUES ('$customer_id', '$first_name', '$last_name', '$email', '$phone', '$address', '$password')";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['customer_id'] = $customer_id;
      header("Location: login.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
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
    <h2>Register</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="user-box">
        <input type="text" name="first_name" required>
        <label>First Name:</label>
      </div>
      <div class="user-box">
        <input type="text" name="last_name" required>
        <label>Last Name:</label>
      </div>
      <div class="user-box">
        <input type="email" name="email" required>
        <label>Email:</label>
      </div>
      <div class="user-box">
        <input type="tel" name="phone">
        <label>Phone:</label>
      </div>
      <div class="user-box">
        <input type="text" name="address">
        <label>Address:</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required>
        <label>Password:</label>
      </div>
      <button type="submit" name="register">Register</button>
    </form>
  </div>
</body>
</html>
