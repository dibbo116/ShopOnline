<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
header('Content-Type: text/xml');

// XML file path
$xmlFile = '../../data/goods.xml';
$doc = new DOMDocument();

// Retrieve form data
$itemName = $_GET['item_name'];
$itemPrice = $_GET['item_price'];
$itemQuantity = $_GET['item_quantity'];
$itemDescription = $_GET['item_description'];

// Check if the XML file exists or create a new one if it doesn't
if (!file_exists($xmlFile)) {
    $items = $doc->createElement('items');
    $doc->appendChild($items);
} else {
    $doc->preserveWhiteSpace = false;
    $doc->load($xmlFile);
    $items = $doc->getElementsByTagName('items')->item(0);
}

// Generate unique item number
$itemNumber = 'ITM' . str_pad($items->childNodes->length + 1, 3, '0', STR_PAD_LEFT);

// Create item node and append details
$item = $doc->createElement('item');
$item->appendChild($doc->createElement('item_number', $itemNumber));
$item->appendChild($doc->createElement('item_name', htmlspecialchars($itemName)));
$item->appendChild($doc->createElement('item_price', htmlspecialchars($itemPrice)));
$item->appendChild($doc->createElement('quantity_available', htmlspecialchars($itemQuantity)));
$item->appendChild($doc->createElement('quantity_on_hold', 0));
$item->appendChild($doc->createElement('quantity_sold', 0));
$item->appendChild($doc->createElement('description', htmlspecialchars($itemDescription)));

$items->appendChild($item);

// Save the XML file
$doc->formatOutput = true;
$doc->save($xmlFile);

// Display success message
echo "The item has been listed in the system, and the item number is: " . $itemNumber;
?>
