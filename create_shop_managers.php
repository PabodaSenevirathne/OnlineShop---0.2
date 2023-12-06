<?php
require 'connection.php';
// if(isset($_SESSION["id"])){
//   header("Location: index.php");
// }

// Check if the user is logged in and is an admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    // If not logged in as admin, log out and redirect to login page
    header("Location: logout.php");
    exit();
}

// If the user is a shop manager, you can set a variable to control form visibility
$showCreateForm = ($_SESSION['role'] === 'admin');

var_dump($_SESSION);

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
                <a href="#">Products</a>
            </li>
            <li>
                <a href="#">Locations</a>
            </li>
            <li>
                <a href="#">Packages</a>
            </li>
            <li>
                <a href="#">Training</a>
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
                <a href="shopping-cart.php">Cart</a>
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