<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
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

    
      .contact-box {
        width: 50%;
        margin: 50px auto;
        background-color: rgba(255, 255, 255, 0.7);
        padding: 20px;
        border-radius: 5px;
      }

      .contact-box h3 {
        margin-bottom: 10px;
      }

      .contact-box p {
        margin-bottom: 5px;
      }

      .contact-box hr {
        margin: 20px 0;
      }
    </style>
  </head>
  <body>
    <div class="login-box">
      <h2>Contact Us</h2>
      <div class="contact-box">
        <h3>Our Team</h3>
        <div class="person-box">
          <p>Almendo Gabriel Tetelepta</p>
          <p>Phone: <a href="https://wa.me/6285243252962">0852-4325-2962</a></p>
        </div>
        <hr>
        <div class="person-box">
          <p>Zahid Robbani</p>
          <p>Phone: <a href="https://wa.me/6281314904262">0813-1490-4262</a></p>
        </div>
        <hr>
        <div class="person-box">
          <p>Farhan Yanuar</p>
          <p>Phone: <a href="https://wa.me/6282218238319">0822-1823-8319</a></p>
        </div>
      </div>
      <button onclick="location.href='dashboard.php'">Back to Dashboard</button>
    </div>
  </body>
</html>
