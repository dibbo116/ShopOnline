<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start(); // Start session to store customer ID

// Path to the XML file
$xmlFile = '../../data/customer.xml';

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];
$loginSuccess = false;
$customerId = "";

// Check if the XML file exists
if (file_exists($xmlFile)) {
    // Load the XML file
    $customers = simplexml_load_file($xmlFile);

    // Search for matching customer by email and password
    foreach ($customers->customer as $customer) {
        if ((string)$customer->email == $email && (string)$customer->password == $password) {
            $loginSuccess = true;
            $customerId = (string)$customer->customer_id;
            break;
        }
    }
}

// Process login result
if ($loginSuccess) {
    // Store customer ID in the session
    $_SESSION['customer_id'] = $customerId;

    // Redirect to the buying page
    header('Location: buying.htm');
    exit();
} else {
    // Login failed, redirect back to login page with error message
    echo "<script>
        alert('Invalid email address or password.');
        window.location.href = 'login.htm';
    </script>";
}
?>
