<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start();

// File path to manager.txt
$managerFile = '../../data/manager.txt';

// Retrieve input values from the login form
$managerId = trim($_POST['manager_id']);
$password = trim($_POST['password']);
$validManager = false;

// Check if the manager file exists
if (file_exists($managerFile)) {
    // Read file content line by line
    $lines = file($managerFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Split the line into manager ID and password
        list($storedManagerId, $storedPassword) = explode(',', $line);

        // Remove extra spaces for comparison
        $storedManagerId = trim($storedManagerId);
        $storedPassword = trim($storedPassword);

        // Verify if entered credentials match the stored ones
        if ($managerId === $storedManagerId && $password === $storedPassword) {
            $_SESSION['manager_id'] = $managerId; // Store the manager ID in session
            $validManager = true;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manager Login - BuyOnline</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f4f4f9;
        }

        .message-container {
            display: inline-block;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        a {
            display: inline-block;
            margin: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        h3 {
            color: green;
        }

        p {
            color: green;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php if ($validManager): ?>
            <!-- Success message and manager options -->
            <h3>Welcome, Manager <?php echo htmlspecialchars($managerId); ?></h3>
            <p>Login successful! What would you like to do?</p>
            <a href="listing.htm">Add New Items</a><br>
            <a href="processing.htm">Process Sold Items</a><br>
        <?php else: ?>
            <!-- Error message if login fails -->
            <p>Invalid manager ID or password. Please try again.</p>
            <a href="mlogin.htm">Back to Login</a>
        <?php endif; ?>
    </div>
</body>
</html>
