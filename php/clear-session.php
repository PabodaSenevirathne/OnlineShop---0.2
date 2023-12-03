<?php
session_start();

if (isset($_POST['okClicked']) && $_POST['okClicked'] === 'true') {
    // Clear the 'cart' session variable
    unset($_SESSION['cart']);

    echo "Session data cleared";
} else {

    echo "Invalid request";
}
?>