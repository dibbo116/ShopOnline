<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
header('Content-Type: text/xml');
if (isset($_GET["first_name"]) && isset($_GET["surname"]) && isset($_GET["email"]) && isset($_GET["password"]) && isset($_GET["phone"])) {

    $firstName = $_GET["first_name"];
    $surname = $_GET["surname"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $phone = $_GET["phone"];

    $errMsg = "";

    // Server-side validation for required fields
    if (empty($firstName)) {
        $errMsg .= "You must enter a first name. <br />";
    }
    if (empty($surname)) {
        $errMsg .= "You must enter a surname. <br />";
    }
    if (empty($email)) {
        $errMsg .= "You must enter an email address. <br />";
    }
    if (empty($password)) {
        $errMsg .= "You must enter a password. <br />";
    }
    if (empty($phone)) {
        $errMsg .= "You must enter a phone number. <br />";
    }

    // Check for any validation errors
    if ($errMsg != "") {
        echo $errMsg;
        exit;
    }

    // Path to the XML file
    $xmlFile = '../../data/customer.xml';

    $doc = new DomDocument();

    // Check if the XML file exists or create a new one if it doesn't exist
    if (!file_exists($xmlFile)) {
        $customers = $doc->createElement('customers');
        $doc->appendChild($customers);
    } else {
        $doc->preserveWhiteSpace = FALSE;
        $doc->load($xmlFile);
    }

    // Check if the email is unique
    $existingEmails = $doc->getElementsByTagName('email');
    foreach ($existingEmails as $existingEmail) {
        if ($existingEmail->nodeValue == $email) {
            echo "Error: The email address is already in use. Please use a different email.";
            exit;
        }
    }

    // Create a customer node under the customers node
    $customers = $doc->getElementsByTagName('customers')->item(0);
    $customer = $doc->createElement('customer');
    $customers->appendChild($customer);

    // Generate a unique customer ID
    $customerID = 'C' . str_pad($customers->childNodes->length + 1, 3, '0', STR_PAD_LEFT);

    // Create Customer ID node
    $customerIDNode = $doc->createElement('customer_id', $customerID);
    $customer->appendChild($customerIDNode);

    // Create First Name, Surname, Email, Password, and Phone nodes
    $customer->appendChild($doc->createElement('first_name', htmlspecialchars($firstName)));
    $customer->appendChild($doc->createElement('surname', htmlspecialchars($surname)));
    $customer->appendChild($doc->createElement('email', htmlspecialchars($email)));
    $customer->appendChild($doc->createElement('password', htmlspecialchars($password)));
    $customer->appendChild($doc->createElement('phone', htmlspecialchars($phone)));

    // Save the XML file
    $doc->formatOutput = true;
    $doc->save($xmlFile);

    // Success message
    echo "Dear " . htmlspecialchars($firstName) . " " . htmlspecialchars($surname) . ", you have successfully registered. Your customer ID is: " . $customerID . ".";
}
?>
