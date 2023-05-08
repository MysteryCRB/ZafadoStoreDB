<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zafadostore";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];
    
    
    $sql = "SELECT * FROM orders WHERE order_id = ? AND status = 'unpaid' ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);
    $result_order = mysqli_stmt_get_result($stmt);

    
    if (!$result_order) {
        die("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result_order);
    $product_id = $row['product_id'];
    

    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    $result_delete = mysqli_stmt_execute($stmt);


    if (!$result_delete) {
        die("Query failed: " . mysqli_error($conn));
    }

    
    $sql = "UPDATE products SET in_stock = in_stock + 1 WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    $result_update = mysqli_stmt_execute($stmt);

    
    if (!$result_update) {
        die("Query failed: " . mysqli_error($conn));
    }
}

$sql = "SELECT * FROM orders WHERE status = 'unpaid'";
$result = mysqli_query($conn, $sql);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
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
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Product Name</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['order_total']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <input type="submit" name="delete_order" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <div style="text-align:center">
    <a href="dashboard.php"><button>Dashboard</button></a>
    <a href="payment.php"><button>Continue to payment</button></a>
    </div>
</body>
</html>

