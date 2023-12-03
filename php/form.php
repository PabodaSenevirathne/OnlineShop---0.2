<?php
session_start();

// Define variables in the form
$nameValidationError = $phoneValidationError = $postcodeValidationError = $addressValidationError = $cityValidationError = $provinceValidationError = $emailValidationError = $cnameValidationError = $ccnumValidationError = $expmonthValidationError = $expyearValidationError = $passwordValidationError = $confirmPasswordValidationError = "";
$name = $phone = $postcode = $address = $city = $province = $email = $cname = $ccnum = $expmonth = $expyear = $password = $confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Validate name (allow only letters and spaces)
  if (empty($_POST["name"])) {
    $nameValidationError = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameValidationError = "Only letters and spaces allowed";
    }
  }

  // Validate phone number
  if (empty($_POST["phone"])) {
    $phoneValidationError = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    
    if (!preg_match('/^\d{10}$/', $phone)) {
      $phoneValidationError = "Invalid phone number";
    }
  }

  // Validate postcode
  if (empty($_POST["postcode"])) {
    $postcodeValidationError = "Post code is required";
  } else {
    $postcode = test_input($_POST["postcode"]);
  }

  // Validate address
  if (empty($_POST["address"])) {
    $addressValidationError = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  // Validate city
  if (empty($_POST["city"])) {
    $cityValidationError = "City is required";
  } else {
    $city = test_input($_POST["city"]);
  }

// Validate province
  if (empty($_POST["province"])) {
    $provinceValidationError = "Province is required";
  } else {
    $province = test_input($_POST["province"]);
  }

  // Validate email
  if (empty($_POST["email"])) {
    $emailValidationError = "Email is required";
  } else {
    $email = test_input($_POST["email"]);

    if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/", $email)) {
      $emailValidationError = "Invalid email address";
    }
  }

  // Get credit card name
  if (empty($_POST["cname"])) {
    $cnameValidationError = "Credit card name is required";
  } else {
    $cname = test_input($_POST["cname"]);
  }

  // Validate credit card number
  if (empty($_POST["ccnum"])) {
    $ccnumValidationError = "Credit card number is required";
  } else {
    $ccnum = test_input($_POST["ccnum"]);

    if (!preg_match('/^\d{4}-\d{4}-\d{4}-\d{4}$/', $ccnum)) {
      $ccnumValidationError = "Invalid credit card number";
    }
  }

  // Validate month
  if (empty($_POST["expmonth"])) {
    $expmonthValidationError = "Expmonth is required";
  } else {
    $expmonth = test_input($_POST["expmonth"]);

    if (!preg_match('/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/', $expmonth)) {
      $expmonthValidationError = "Invalid month";
    }
  }

  // Validate year
  if (empty($_POST["expyear"])) {
    $expyearValidationError = "Expyear is required";
  } else {
    $expyear = test_input($_POST["expyear"]);

    if (!preg_match('/^\d{4}$/', $expyear)) {
      $expyearValidationError = "Invalid Year";
    }
  }

  // Validate password
  if (empty($_POST["password"])) {
    $passwordValidationError = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

// Validate confirm password
  if (empty($_POST["confirmPassword"])) {
    $confirmPasswordValidationError = "ConfirmPassword is required";
  } else {
    $confirmPassword = test_input($_POST["confirmPassword"]);
    //compare 'Password' and 'Confirm Password'
    if ($password !== $confirmPassword) {
      $confirmPasswordValidationError = "Passwords do not match";
    }
  }

// Only if the all the validations pass, generate the receipt
  if (empty($nameValidationError) && empty($phoneValidationError) && empty($postcodeValidationError) && empty($addressValidationError) && empty($cityValidationError) && empty($provinceValidationError) && empty($emailValidationError) && empty($cnameValidationError) && empty($ccnumValidationError) && empty($expmonthValidationError) && empty($expyearValidationError) && empty($passwordValidationError) && empty($confirmPasswordValidationError)) {
   
    // Access details from the session
    $_SESSION['formData'] = [
      'name' => $name,
      'phone' => $phone,
      'postcode' => $postcode,
      'address' => $address,
      'city' => $city,
      'province' => $province,
      'email' => $email,
      'cname' => $cname,
      'ccnum' => $ccnum,
      'expmonth' => $expmonth,
      'expyear' => $expyear,
    ];

    // Print the receipt
    echo "<script>
      function openPopupWindow() {
      window.open('receipt.php', '_blank', 'width=600, height=700');
    }
    </script>";
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
