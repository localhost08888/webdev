file1.php

<!DOCTYPE html>
<html >
<head> 
    <script>
        function showSuggestions(str)
         {
            if (str.length === 0)
             {
                document.getElementById("suggestions").innerHTML = "";
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "file2.php?q=" + str, true);
            xhr.onreadystatechange = function () 
            {
                if (xhr.readyState == 4 && xhr.status == 200)
                 {
                    document.getElementById("suggestions").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <h2>Search for Suggestions</h2>
    <input type="text" onkeyup="showSuggestions(this.value)" placeholder="Type something...">
    <div id="suggestions"></div>
</body>
</html>
=========================================
file2.php

<?php
$suggestions = ["Alice", "Bob", "Charlie", "David", "Daniel", "Eve", "Edward", "Emily", "Frank", "George"];

if (isset($_GET['q'])) 
{
    $query = strtolower(trim($_GET['q']));
    $matches = array_filter($suggestions, function ($name) use ($query) 
    {
        return stripos($name, $query) !== false;
    });

    echo $matches ? implode("<br>", $matches) : "No suggestions found";
}
?>
