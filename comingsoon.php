<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Coming Soon</title>
  <link rel="stylesheet" type="text/css" href="product.css">

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
      background-color: rgba(0,0,0,0.5);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
      transform: skew(-10deg);
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 50px;
      transform: skew(10deg);
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
<div class="header">
	<div class="logo">ZafadoStore</div>
	<div class="nav">
		<a href="dashboard.php">Home</a>
		<a href="contact.php">Contact</a>
	</div>
</div>
  <div class="product-box middle">
    <h2>Unfortunately this page is not available at the moment</h2>
    <p>We will inform you about this sooner or later!</p>
    <button onclick="window.history.back()">Go Back</button>
  </div>
</body>
</html>
