<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "store");


// IF
if (isset($_POST["action"])) {
  if ($_POST["action"] == "register") {
    register();
  } else if ($_POST["action"] == "login") {
    login();
  } else if ($_POST["action"] == "checkout") {
    saveData();
  }
}

// REGISTER
function register()
{
  global $conn;

  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $role = $_POST["role"];

  if (empty($name) || empty($username) || empty($password) || empty($role)) {
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  if (mysqli_num_rows($user) > 0) {
    echo "Username Has Already Taken";
    exit;
  }

  $query = "INSERT INTO user VALUES('', '$name', '$username', '$password', '$role')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
}

// LOGIN
function login()
{
  global $conn;

  $username = $_POST["username"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($user) > 0) {

    $row = mysqli_fetch_assoc($user);

    if ($password == $row['password']) {
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["role"] = $row["role"];
    } else {
      echo "Wrong Password";
      exit;
    }
  } else {
    echo "User Not Registered";
    exit;
  }
}

// Save checkoutData
function saveData()
{
  global $conn;

  $userId = $_POST["userId"];
  $sessionId = session_id();  // Retrieve the current session ID
  //Retrieve form data
  $product1Qty = $_POST['product1Qty'];
  $product2Qty = $_POST['product2Qty'];
  $product3Qty = $_POST['product3Qty'];
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $postcode = $_POST["postcode"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $province = $_POST["province"];
  $email = $_POST["email"];
  $cname = $_POST["cname"];
  $ccnum = $_POST["ccnum"];
  $expmonth = $_POST["expmonth"];
  $expyear = $_POST["expyear"];
  $cvv = $_POST["cvv"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];

  if (empty($name) || empty($phone) || empty($postcode) || empty($address)) {
    echo "Please Fill Out The Form!";
    exit;
  }




  $product1Price = 10;  // Replace with the actual price for product 1
  $product2Price = 15;  // Replace with the actual price for product 2
  $product3Price = 20;  // Replace with the actual price for product 3

  // Calculate subtotals for each product
  $subtotal1 = $product1Qty * $product1Price;
  $subtotal2 = $product2Qty * $product2Price;
  $subtotal3 = $product3Qty * $product3Price;

  // Calculate total without tax
  $totalWithoutTax = $subtotal1 + $subtotal2 + $subtotal3;


  // Retrieve province from the form data
  $province = $_POST["province"];

  // Calculate sales tax based on the province
  $taxRate = getSalesTaxRate($province);
  $salesTax = $totalWithoutTax * $taxRate;

  // Calculate the final total with tax
  $total = $totalWithoutTax + $salesTax;

  $query = "INSERT INTO orders VALUES('','$userId','$sessionId','$product1Qty','$product2Qty','$product3Qty','$name', '$phone', '$postcode', '$address','$city','$province','$email','$cname','$ccnum','$expmonth','$expyear', '$cvv','$password','$confirmPassword', '$total','$salesTax')";

  if (mysqli_query($conn, $query)) {
    echo "Data Save Successful";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  // mysqli_close($conn);
}




function getSalesTaxRate($province)
{
  // Tax rates for each province
  $taxRates = [
    'Alberta' => 0.05,
    'British Columbia' => 0.07,
    'Manitoba' => 0.08,
    'New Brunswick' => 0.10,
    'Newfoundland and Labrador' => 0.08,
    'Nova Scotia' => 0.10,
    'Ontario' => 0.13,
    'Prince Edward Island' => 0.09,
    'Quebec' => 0.09975,
    'Saskatchewan' => 0.06
  ];

  return isset($taxRates[$province]) ? $taxRates[$province] : 0;
}
