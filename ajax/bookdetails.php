file1.php

<!DOCTYPE html>
<html lang="en">

<body>
    <h2>Select a Book</h2>
    <select id="book" onchange="getBookDetails()">
        <option value="Harry Potter">Harry Potter</option>
        <option value="The Hobbit">The Hobbit</option>
        <option value="1984">1984</option>
    </select>
    <div id="result"></div>

    <script>
        function getBookDetails() {
            var bookName = document.getElementById("book").value;
            var result = document.getElementById("result");


            var xhr = new XMLHttpRequest();
            xhr.open("GET", "books.xml", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var xmlDoc = xhr.responseXML;
                    var books = xmlDoc.getElementsByTagName("book");
                    var output = "";

                    for (var i = 0; i < books.length; i++) {
                        var title = books[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
                        if (title === bookName) {
                            var author = books[i].getElementsByTagName("author")[0].childNodes[0].nodeValue;
                            var year = books[i].getElementsByTagName("year")[0].childNodes[0].nodeValue;
                            var price = books[i].getElementsByTagName("price")[0].childNodes[0].nodeValue;
                            output += "<h3>" + title + "</h3>";
                            output += "Author: " + author + "<br>";
                            output += "Year: " + year + "<br>";
                            output += "Price: $" + price + "<br>";
                        }
                    }

                    if (output === "") {
                        result.innerHTML = "Book not found.";
                    }
                    else {
                        result.innerHTML = output;
                    }
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>
===================================================
books.xml

<books>
    <book>
        <title>Harry Potter</title>
        <author>J.K. Rowling</author>
        <year>1997</year>
        <price>20.00</price>
    </book>
    <book>
        <title>The Hobbit</title>
        <author>J.R.R. Tolkien</author>
        <year>1937</year>
        <price>15.00</price>
    </book>
    <book>
        <title>1984</title>
        <author>George Orwell</author>
        <year>1949</year>
        <price>18.00</price>
    </book>
</books>