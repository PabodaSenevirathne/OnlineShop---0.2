<?php
require 'connection.php';
// if(isset($_SESSION["id"])){
//   header("Location: index.php");
// }

// Check if the user is logged in and is an admin
//if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    // If not logged in as admin, redirect to login page
   // header("Location: login.php");
    //exit();
//}


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
    <h2>Create Shop Manager</h2>
    <?php if (isset($message)): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form autocomplete="off" method="post" action="create_shop_manager.php">
    <form autocomplete="off" action="" method="post">
      <input type="hidden" id="action" value="register">
      <label for="">Name</label>
      <input type="text" id="name" value=""> <br>
      <label for="">Username</label>
      <input type="text" id="username" value=""> <br>
      <label for="">Password</label>
      <input type="password" id="password" value=""> <br>
      <button type="button" onclick="submitData();">Register</button>
    </form>
    <?php require 'script.php'; ?>
</body>
</html>
