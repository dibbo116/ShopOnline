<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start(); // Start the session
// Load the goods XML file
$xmlFile = '../../data/goods.xml';
$xml = simplexml_load_file($xmlFile);

// Process sold items
foreach ($xml->item as $item) {
    $quantitySold = (int)$item->quantity_sold;
    
    if ($quantitySold > 0) {
        // Clear the quantity sold
        $item->quantity_sold = 0;

        // Remove items that have been completely sold (quantity available and on hold = 0)
        if ((int)$item->quantity_available === 0 && (int)$item->quantity_on_hold === 0) {
            $dom = dom_import_simplexml($item);
            $dom->parentNode->removeChild($dom);
        }
    }
}

// Save the updated XML file
$xml->asXML($xmlFile);

// Response message
echo "Sold items have been processed successfully!";
?>
