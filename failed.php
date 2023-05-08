<!DOCTYPE html>
<html>
<head>
  <title>Login Failed</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-color: #000;
    }

    .login-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      position: relative;
      text-align: center
    }

    h1 {
      color: #fff;
      margin-bottom: 50px;
      font-size: 40px;
      font-family: "Lora", sans-serif;
    }

    .button {
      background-color: #03a9f4;
      border: none;
      color: #fff;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-bottom: 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #0288d1;
    }

    .white-box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      height: 250px;
      background-color: #fff;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    .white-box:before {
      content: "";
      position: absolute;
      top: -20px;
      left: -20px;
      height: 20px;
      width: 20px;
      background-color: #fff;
      border-top-left-radius: 40px;
      transform: rotate(-45deg);
    }

    .white-box:after {
      content: "";
      position: absolute;
      bottom: -20px;
      right: -20px;
      height: 20px;
      width: 20px;
      background-color: #fff;
      border-bottom-right-radius: 40px;
      transform: rotate(-45deg);
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="white-box">
      <h1>Login Failed</h1>
      <p>Invalid email or password.</p>
      <button class="button" onclick="location.href='login.php'">Go back to login page</button>
    </div>
  </div>
</body>
</html>
