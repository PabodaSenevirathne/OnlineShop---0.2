<?php
require 'connection.php';

// Check if the user is logged in and is an admin or shop manager
session_start();  // Start the session
if (!isset($_SESSION['id']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'manager')) {
    // If not logged in as admin or shop manager, redirect to login page
    header("Location: login.php");
    exit();
}


// Fetch all orders from the database
$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);

// Check if there are orders
if ($result && mysqli_num_rows($result) > 0) {
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // No orders found
    $orders = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/orders.css">
    <title>Orders</title>
</head>
<body>
    <h2>Orders</h2>
    
    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Products</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><?php echo $order['product1Qty']; ?></td>
                        <td><?php echo $order['total_amount']; ?></td>
                        <!-- Add more details as necessary -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No orders available.</p>
    <?php endif; ?>
    
</body>
</html>

