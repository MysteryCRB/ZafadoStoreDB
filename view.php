<!DOCTYPE html>
<html>
<head>
	<title>Reviews</title>
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
		<thead>
			<tr>
				<th>ID</th>
				<th>Rating</th>
				<th>Review Text</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "zafadostore";
				$conn = mysqli_connect($servername, $username, $password, $dbname);

			
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT customer_id, rating, review_text FROM reviews";
				$result = mysqli_query($conn, $sql);

				
				if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) {
				        echo "<tr><td>" . $row["customer_id"] . "</td><td>" . $row["rating"] . "</td><td>" . $row["review_text"] . "</td></tr>";
				    }
				} else {
				    echo "<tr><td colspan='3'>No reviews found</td></tr>";
				}

			
				mysqli_close($conn);
			?>
		</tbody>
	</table>
	<div style="text-align:center">
	<a href="dashboard.php"><button>Dashboard</button></a>
	</div>
</body>
</html>
