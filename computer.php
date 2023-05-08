<html>
    <head>
        <title>
            Zafado Computers
        </title>
        <style type="text/css">
		.header {
			background-color: #1f1f1f;
			height: 50px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 50px;
		}
		.logo {
			color: white;
			font-size: 24px;
			font-weight: bold;
		}
		.nav {
			display: flex;
			align-items: center;
		}
		.nav a {
			color: white;
			margin: 0 20px;
			text-decoration: none;
			font-size: 18px;
			font-weight: bold;
		}
		.image {
			text-align: center;
			margin-top: 50px;
		}
		.image img {
			width: 300px;
			height: 300px;
			border-radius: 5px;
		}
		.product-info {
			text-align: center;
			margin-top: 20px;
		}
		.product-info h2 {
			color: #fff;
			font-size: 24px;
			margin-bottom: 10px;
		}
		.product-info p {
			color: #fff;
			font-size: 18px;
			margin-bottom: 20px;
		}
		.product-info button {
			background: transparent;
			border: none;
			outline: none;
			color: #fff;
			background: #03a9f4;
			padding: 10px 20px;
			cursor: pointer;
			border-radius: 5px;
		}
		.product-box {
			display: inline-block;
			width: 30%;
			margin: 20px;
		}
		.left {
			float: left;
		}
		.right {
			float: right;
		}
		.middle {
			margin: 0 auto;
		}
		.bottom {
			clear: both;
			margin-top: 20px;
		}
        </style>
    </head>
    <body>
    <div class="header">
		<div class="logo">Zafado Store</div>
		<nav class="nav">
			<a href="dashboard.php">Home</a>
			<a href="contact.php">Contact Us</a>
		</nav>
	</div>

    <div class="product-box left">
  <div class="image">
    <img src="gamingpc.jpg" alt="Product Image">
  </div>
  <div class="product-info">
    <h2>Gaming</h2>
    <p>Computer designed for playing video games with high-end hardware and specialized peripherals for immersive gameplay.</p>
    <a href="gamingpc.php"><button>More information</button></a>
  </div>
</div>

<div class="product-box middle">
  <div class="image">
    <img src="custompc.jpg" alt="Product Image">
  </div>
  <div class="product-info">
    <h2>Custom PC</h2>
    <p>A computer assembled from individual hardware components according to the user's specific needs and preferences, providing greater flexibility and customization options.</p>
    <a href="comingsoon.php"><button>Coming Soon!</button></a>
  </div>
</div>

<div class="product-box right">
  <div class="image">
    <img src="normalpc.jpg" alt="Product Image">
  </div>
  <div class="product-info">
    <h2>PC</h2>
    <p>General-purpose computer used for tasks like browsing, emailing, and document creation, with modest hardware specifications.</p>
    <a href="comingsoon.php"><button>Coming Soon!</button></a>
  </div>
</div>
    </body>
</html>