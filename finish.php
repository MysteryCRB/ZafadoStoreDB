<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background.jpg) no-repeat;
        background-size: cover;
      }

      .confirmation-box {
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-align: center;
      }

      .confirmation-box h2 {
        margin-bottom: 50px;
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
        margin: 10px;
      }
    </style>
  </head>
  <body>
    <div class="confirmation-box">
      <h2>Your purchase has been confirmed!</h2>
      <p>Thank you for the order, the product will be arrived at your location soon.</p>
      <button onclick="location.href='dashboard.php';">Back to Dashboard</button>
      <button onclick="location.href='review.php';">Write a Review</button>
    </div>
  </body>
</html>
