<?php
$xml = new DOMDocument("1.0", "ISO-8859-1");
$xml->formatOutput = true;

$cricketTeam = $xml->createElement("Cricket_team");
$xml->appendChild($cricketTeam);

$countries = [
    [
        "name" => "India",
        "players" => [
            ["name" => "Virat Kohli", "wickets" => 4, "runs" => 12000],
            ["name" => "Jasprit Bumrah", "wickets" => 200, "runs" => 500]
        ]
    ],
    [
        "name" => "England",
        "players" => [
            ["name" => "Joe Root", "wickets" => 30, "runs" => 9000],
            ["name" => "Jofra Archer", "wickets" => 100, "runs" => 1000]
        ]
    ]
];

foreach ($countries as $countryData) {
    $country = $xml->createElement("Country");
    $country->setAttribute("name", $countryData["name"]);
    
    foreach ($countryData["players"] as $player) {
        $playerElement = $xml->createElement("Player");
        
        $name = $xml->createElement("Player_Name", $player["name"]);
        $playerElement->appendChild($name);
        
        $wickets = $xml->createElement("Wickets", $player["wickets"]);
        $playerElement->appendChild($wickets);
        
        $runs = $xml->createElement("Runs", $player["runs"]);
        $playerElement->appendChild($runs);
        
        $country->appendChild($playerElement);
    }
    
    $cricketTeam->appendChild($country);
}

$xml->save("cricket.xml");
echo "cricket.xml file created successfully.";
?>
