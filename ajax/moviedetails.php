file1.php

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie Finder</title>
    <script>
        function fetchMovies() 
        {
            var actor = document.getElementById("actorSelect").value;
            if (actor === "") return;
            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "file2.php?actor=" + encodeURIComponent(actor), true);
            xhr.onreadystatechange = function () 
            {
                if (xhr.readyState == 4 && xhr.status == 200) 
                {
                    document.getElementById("movieDetails").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>

    <h1>Select an Actor to View Movies</h1>

    <select id="actorSelect" onchange="fetchMovies()">
    
        <option value="nilesh">nilesh</option>
        <option value="om">om</option>
        <option value="swaraj">swaraj</option>
    </select>

    <h3>Movie Details:</h3>
    <div id="movieDetails" ></div>

</body>
</html>

<!-- CREATE TABLE MOVIE (
    mno SERIAL PRIMARY KEY,
    mname VARCHAR(100),
    release_yr INT
);

CREATE TABLE ACTOR (
    ano SERIAL PRIMARY KEY,
    aname VARCHAR(100)
);

CREATE TABLE MOVIE_ACTOR (
    mno INT REFERENCES MOVIE(mno),
    ano INT REFERENCES ACTOR(ano),
    PRIMARY KEY (mno, ano)
); -->
========================================
file2.php



<?php
$conn = pg_connect("host=localhost dbname=your_database user=your_user password=your_password") 
   
or die("Connection failed!");

if (isset($_GET["actor"]))
 {
    $actor = pg_escape_string($conn, $_GET["actor"]);
    $query = "SELECT m.mname, m.release_yr 
              FROM MOVIE m 
              JOIN MOVIE_ACTOR ma ON m.mno = ma.mno 
              JOIN ACTOR a ON ma.ano = a.ano 
              WHERE a.aname = '$actor'";

    $result = pg_query($conn, $query);
    echo pg_num_rows($result) ? implode("<br>", array_map(fn($row) => "{$row['mname']} ({$row['release_yr']})", pg_fetch_all($result))) : "No movies found!";
}

pg_close($conn);
?>




<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $aname = $_GET['aname'];
        $movies = [
            'nilesh' => [
                ['mno' => 201, 'mname' => 'Inception', 'release_yr' => 2010],
                ['mno' => 202, 'mname' => 'Titanic', 'release_yr' => 1997]
            ],
            'om' => [
                ['mno' => 301, 'mname' => 'Fight Club', 'release_yr' => 1999],
                ['mno' => 302, 'mname' => 'Troy', 'release_yr' => 2004]
            ],
            'swaraj' => [
                ['mno' => 401, 'mname' => 'Lucy', 'release_yr' => 2014],
                ['mno' => 402, 'mname' => 'Marriage Story', 'release_yr' => 2019]
            ]
        ];

        if (isset($movies[$aname])) {
            foreach ($movies[$aname] as $movie) {
                echo "Movie No: " . $movie['mno'] . "<br>";
                echo "Movie Name: " . $movie['mname'] . "<br>";
                echo "Release Year: " . $movie['release_yr'] . "<br><br>";
            }
        } else {
            echo "No movies found for the selected actor.";
        }
    }
    ?>
