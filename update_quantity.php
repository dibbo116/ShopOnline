<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemNumber = $_POST['item_number'];
    $xmlFile = '../../data/goods.xml';
    
    // Load the XML file
    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);

        // Find the item by item_number
        foreach ($xml->item as $item) {
            if ((string)$item->item_number === $itemNumber) {
                $quantityAvailable = (int)$item->quantity_available;

                // Check if item is available
                if ($quantityAvailable > 0) {
                    // Update XML: decrease quantity_available, increase quantity_on_hold
                    $item->quantity_available = $quantityAvailable - 1;
                    $item->quantity_on_hold = (int)$item->quantity_on_hold + 1;

                    // Save the XML file
                    $xml->asXML($xmlFile);
                    echo "Item added to cart successfully.";
                    exit();
                } else {
                    echo "out_of_stock";
                    exit();
                }
            }
        }
    }

    echo "Item not found in catalog.";
}
?>
