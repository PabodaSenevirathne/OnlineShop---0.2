<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "store");


// IF
if(isset($_POST["action"])){
    if($_POST["action"] == "register"){
      register();
    }
    else if($_POST["action"] == "login"){
      login();
    }
    else if($_POST["action"] == "checkout"){
        saveData();
      }
  }
  
  // REGISTER
  function register(){
    global $conn;
  
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
  
    if(empty($name) || empty($username) || empty($password)|| empty($role)){
      echo "Please Fill Out The Form!";
      exit;
    }
  
    $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($user) > 0){
      echo "Username Has Already Taken";
      exit;
    }
  
    $query = "INSERT INTO user VALUES('', '$name', '$username', '$password', '$role')";
    mysqli_query($conn, $query);
    echo "Registration Successful";
  }
  
  // LOGIN
  function login(){
    global $conn;
  
    $username = $_POST["username"];
    $password = $_POST["password"];
  
    $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  
    if(mysqli_num_rows($user) > 0){
  
      $row = mysqli_fetch_assoc($user);
  
      if($password == $row['password']){
        echo "Login Successful";
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        $_SESSION["role"] = $row["role"];
      }
      else{
        echo "Wrong Password";
        exit;
      }
    }
    else{
      echo "User Not Registered";
      exit;
    }
  }

   // Save checkoutData
   function saveData(){
    global $conn;
  
    $userId = $_POST["userId"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $postcode = $_POST["postcode"];
    $address = $_POST["address"];
  
    if(empty($name) || empty($phone) || empty($postcode) || empty($address)){
      echo "Please Fill Out The Form!";
      exit;
    }
  
    $query = "INSERT INTO orders VALUES('','$userId', '$name', '$phone', '$postcode', '$address')";
    mysqli_query($conn, $query);
    echo "Data Save Successful";
  }

?>