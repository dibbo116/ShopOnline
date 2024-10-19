<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartXml = $_POST['cart'];
    $xml = simplexml_load_string($cartXml);
    $goodsXml = simplexml_load_file('../../data/goods.xml');

    foreach ($xml->item as $cartItem) {
        foreach ($goodsXml->item as $xmlItem) {
            if ((string)$xmlItem->item_number === (string)$cartItem->item_number) {
                $xmlItem->quantity_on_hold = (int)$xmlItem->quantity_on_hold - (int)$cartItem->quantity; // Decrease on hold
                $xmlItem->quantity_sold = (int)$xmlItem->quantity_sold + (int)$cartItem->quantity; // Increase sold
                break;
            }
        }
    }

    $goodsXml->asXML('../../data/goods.xml'); // Save changes to XML
    echo "Your purchase has been confirmed!";
}
?>
