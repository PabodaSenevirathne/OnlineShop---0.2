<?php
require 'connection.php';

// Check if the user logged in or not
if (!isset($_SESSION['id'])) {
    // If yes, redirect to login page
    header("Location: login.php");
    exit();
}

// Check if the logged user is an admin or not
if ($_SESSION['role'] !== 'admin') {
    // If not an admin, log out and redirect to login page
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$showCreateForm = ($_SESSION['role'] === 'admin');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Shop Manager</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<header>
        <div class="logo">
            <img src="images/logo2.svg" alt="Your Logo" width="100" height="100">
        </div>
        <div class="title">
            <h1>Welcome to Our Online Store</h1>
            <p>Your One-Stop Shop for Quality Products</p>
        </div>
        <script>
        </script>

    </header>

    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="checkout.php">Buy Now</a>
            </li>
            <li>
                <a href="orders.php">Orders</a>
            </li>
            <li>
            <a href="create_shop_managers.php">Create</a>
            </li>
            <li>
                <a href="#">About</a>
                <ul class="sub_menu">
                    <li>
                        <a href="#">Mission</a>
                        <ul class="sub_sub_menu">
                            <li>
                                <a href="#">Mission</a>
                            </li>
                            <li>
                                <a href="#">Vision</a>
                            </li>
                            <li>
                                <a href="#">Team</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Vision</a>
                    </li>
                    <li>
                        <a href="#">Team</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>


    <h2>Create Shop Manager</h2>
    <?php if (isset($message)) : ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if ($showCreateForm): ?>
    <form autocomplete="off" action="" method="post">
        <input type="hidden" id="action" value="register">
        <label for="">Name</label>
        <input type="text" id="name" value=""> <br>
        <label for="">Username</label>
        <input type="text" id="username" value=""> <br>
        <label for="">Password</label>
        <input type="password" id="password" value=""> <br>
        <label for="">Role</label>
        <input type="text" id="role" value=""> <br>
        <button type="button" onclick="submitData();">Register</button>
    </form>
    <?php else: ?>
        <p>You do not have permission to create new shop managers.</p>
    <?php endif; ?>
    <?php require 'script.php'; ?>
</body>

</html>