book.php


<?php
// Load the XML file
$xml = simplexml_load_file("book.xml") or die("Error: Cannot load XML file");

// Loop through each book element
foreach ($xml->book as $book) {
    echo "Book ID: " . $book['id'] . "<br>";
    echo "Title: " . $book->title . "<br>";
    echo "Author: " . $book->author . "<br>";
    echo "Year: " . $book->year . "<br>";
    echo "<hr>";
}
?>
================================================================
book.xml

<?xml version="1.0" encoding="UTF-8"?>
<library>
    <book id="1">
        <title>Introduction to Algorithms</title>
        <author>Thomas H. Cormen</author>
        <year>2009</year>
    </book>
    <book id="2">
        <title>Clean Code</title>
        <author>Robert C. Martin</author>
        <year>2008</year>
    </book>
</library>




 