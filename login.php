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

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  if ($email === 'almendo.071105@gmail.com') {
    $_SESSION['user_role'] = 'admin';
    header("Location: admin.php");
    exit();
  }
  

  $sql = "SELECT * FROM Customers WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();
    $_SESSION['customer_id'] = $row['customer_id'];
    $_SESSION['login']=true;//tiket untuk masuk ke dashboard
    header("Location: dashboard.php");
    exit();
  } else {
    header("Location: failed.php");
    exit();
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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

    .login-box h1 {
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
  <div class="login-box">
    <h1>Login</h1>
  
    <?php
    if (isset($_GET['failed'])) {
      echo "Invalid email or password";
    }
    ?>
  
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php
    
    ?>
      <div class="user-box">
        <input type="email" name="email" required>
        <label>Email:</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required>
        <label>Password:</label>
      </div>
    
      <button type="submit" name="login">Login</button>
    </form><br> 
    <div style="text-align:center"><a href="register.php">Dont have an account?</a></div>

  </div>
</body>
</html>
