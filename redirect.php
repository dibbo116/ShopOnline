<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start(); // Start the session

// Check if the user is logged in as a customer or a manager
if (!isset($_SESSION['customer_id']) && !isset($_SESSION['manager_id'])) {
    // If neither is set, respond with a 403 status
    http_response_code(403);
    exit();
}
?>
