<?php
header("Content-Type: text/xml");

$xml = new DOMDocument("1.0", "ISO-8859-1");
$xml->formatOutput = true;

$cdStore = $xml->createElement("CD_Store");
$xml->appendChild($cdStore);

$movies = [
    ["Title" => "Mr. India", "Release_Year" => "1987"],
    ["Title" => "Holiday", "Release_Year" => "2014"],
    ["Title" => "LOC", "Release_Year" => "2003"]
];

foreach ($movies as $movie) {
    $movieElement = $xml->createElement("Movie");
    
    $title = $xml->createElement("Title", $movie["Title"]);
    $movieElement->appendChild($title);
    
    $releaseYear = $xml->createElement("Release_Year", $movie["Release_Year"]);
    $movieElement->appendChild($releaseYear);
    
    $cdStore->appendChild($movieElement);
}

echo $xml->saveXML();
?>
