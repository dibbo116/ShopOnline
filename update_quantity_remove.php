<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemNumber = $_POST['item_number'];
    $quantity = (int)$_POST['quantity'];
    $xmlFile = '../../data/goods.xml';

    // Load the XML file
    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);

        // Find the item by item_number
        foreach ($xml->item as $item) {
            if ((string)$item->item_number === $itemNumber) {
                $item->quantity_on_hold = (int)$item->quantity_on_hold - $quantity; // Decrease on hold
                $item->quantity_available = (int)$item->quantity_available + $quantity; // Increase available
                
                // Save the XML file
                $xml->asXML($xmlFile);
                echo "Item removed from cart successfully.";
                exit();
            }
        }
    }

    echo "Item not found in catalog.";
}
?>
