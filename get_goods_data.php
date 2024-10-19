<?php
/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
// Set the path to your XML file
$url = '../../data/goods.xml';

// Create a new DOMDocument object
$doc = new DOMDocument();

// Load the XML file
if ($doc->load($url)) {
    // Output the XML content
    header("Content-Type: application/xml");
    echo $doc->saveXML();
} else {
    // Handle error loading XML
    http_response_code(404);
    echo '<error>XML file not found</error>';
}
?>
