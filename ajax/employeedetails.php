file1.php

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AJAX Employee Details</title>
    <script>
        function getEmployeeDetails() 
        {
            var ename = document.getElementById("employeeSelect").value;

            if (ename === "")
             {
                document.getElementById("details").innerHTML = "";
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "file2.php?ename=" + encodeURIComponent(ename), true);

            xhr.onreadystatechange = function ()
             {
                if (xhr.readyState == 4 && xhr.status == 200)
                 {
                    document.getElementById("details").innerHTML = xhr.responseText;
                }
            };

            xhr.send();
        }
    </script>
</head>
<body>

    <h2>Select Employee</h2>
    
    <label for="employeeSelect">Choose Employee:</label>
    <select id="employeeSelect" onchange="getEmployeeDetails()">
        <option value="">Select an employee</option>
        <option value="nilesh">nilesh</option>
        <option value="om">om</option>
        <option value="swaraj">swaraj</option>
    </select>

    <h3>Employee Details:</h3>
    <div id="details"></div>

</body>
</html>

<!-- CREATE TABLE EMP
  (
    eno INT PRIMARY KEY,
    ename VARCHAR(50),
    designation VARCHAR(50),
    salary DECIMAL(10,2)
);

INSERT INTO EMP VALUES 
(101, 'Alice', 'Manager', 75000),
(102, 'Bob', 'Developer', 60000),
(103, 'Charlie', 'Analyst', 50000); -->


========================================
file2.php

<!-- <?php
$conn = pg_connect("host=localhost dbname=your_database user=your_user password=your_password");

if (!$conn) 
{
   die("Connection failed!"); 
  }

if (isset($_GET["ename"]))
 {
    $ename = pg_escape_string($conn, $_GET["ename"]);
    $query = "SELECT * FROM employee WHERE ename='$ename'";
    $result = pg_query($conn, $query);

    if ($row = pg_fetch_assoc($result)) 
    {
        echo "Employee No: {$row['eno']}<br>Name: {$row['ename']}<br>Designation: {$row['designation']}<br>Salary: \${$row['salary']}";
    } 
    else
     {
        echo "No employee found!";
    }
}

pg_close($conn);
?> 





<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $ename = $_GET['ename'];

    $employees = [
        'nilesh' => ['eno' => 101, 'designation' => 'Manager', 'salary' => 75000],
        'om' => ['eno' => 102, 'designation' => 'Developer', 'salary' => 60000],
        'swaraj' => ['eno' => 103, 'designation' => 'Analyst', 'salary' => 50000]
    ];

    if (isset($employees[$ename])) {
        $emp = $employees[$ename];
        echo "Employee No: {$emp['eno']}<br>";
        echo "Name: $ename<br>";
        echo "Designation: {$emp['designation']}<br>";
        echo "Salary: \${$emp['salary']}";
    } else {
        echo "No employee found.";
    }
}
?>