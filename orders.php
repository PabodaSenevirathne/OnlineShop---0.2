<?php
session_start();

// Check if the user is logged in and is an admin or shop manager
//if (!isset($_SESSION['id']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'shop_manager')) {
    // If not logged in as admin or shop manager, redirect to login page
   // header("Location: login.php");
   // exit();
//}

// Here, you can retrieve orders from the database and format them for display
// Replace this with your actual logic to fetch and format orders
//$orders = getOrdersFromDatabase();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Add any additional styling or libraries for improved user experience -->
</head>
<body>
    <h2>Orders</h2>
    
    <?php if (!empty($orders)): ?>
        <div class="order-list">
            <?php foreach ($orders as $order): ?>
                <div class="order">
                    <!-- Format and display order information as needed -->
                    <p>Order ID: <?php echo $order['id']; ?></p>
                    <p>Customer: <?php echo $order['customer_name']; ?></p>
                    <p>Products: <?php echo $order['products']; ?></p>
                    <p>Total: <?php echo $order['total_amount']; ?></p>
                    <!-- Add more details as necessary -->
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No orders available.</p>
    <?php endif; ?>
    
</body>
</html>
