<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start();
$userId = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : (isset($_SESSION['manager_id']) ? $_SESSION['manager_id'] : 'Unknown');
session_destroy(); // Destroy the session
echo "ID: " . $userId; // Return the user ID to display on logout
?>
