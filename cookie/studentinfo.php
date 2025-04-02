file1.php
<!Doctype html>
<html>
<head>
    <title>Student Information</title>
</head>
<body>
    <h2>Enter Student's Information</h2>
    <form method="post" action="file2.php">
        Name : <input type="text" name="name" required> <br><br>
        Class : <input type="text" name="class" required> <br><br>
        Address : <input type="text" name="address" required> <br><br>
        <input type="submit" name="submit" value="NEXT">
    </form>
</body>
</html>
===========================
file2.php

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['class'] = $_POST['class'];
    $_SESSION['address'] = $_POST['address'];
}
?>

<!Doctype html>
<html>
<head>
    <title>Enter Marks</title>
</head>
<body>
    <h2>Enter Student Marks</h2>
    <form method="post" action="file3.php">
        Physics   : <input type="number" name="physics" required> <br><br>
        Biology   : <input type="number" name="biology" required> <br><br>
        Chemistry : <input type="number" name="chemistry" required> <br><br>
        Maths     : <input type="number" name="maths" required> <br><br>
        Marathi   : <input type="number" name="marathi" required> <br><br>
        English   : <input type="number" name="english" required> <br><br>
        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>
</html>
==============================================
file 3.php

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $_SESSION['physics'] = $_POST['physics'];
    $_SESSION['biology'] = $_POST['biology'];
    $_SESSION['chemistry'] = $_POST['chemistry'];
    $_SESSION['maths'] = $_POST['maths'];
    $_SESSION['marathi'] = $_POST['marathi'];
    $_SESSION['english'] = $_POST['english'];

    // Calculate total and percentage
    $total = $_SESSION['physics'] + $_SESSION['biology'] + $_SESSION['chemistry'] + 
             $_SESSION['maths'] + $_SESSION['marathi'] + $_SESSION['english'];
    $percentage = ($total / 600) * 100;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Sheet</title>
</head>
<body>
    <h2>Student Mark Sheet</h2>
    <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
    <p><strong>Class:</strong> <?php echo $_SESSION['class']; ?></p>
    <p><strong>Address:</strong> <?php echo $_SESSION['address']; ?></p>

    <h3>Marks Obtained</h3>
    <p>Physics: <?php echo $_SESSION['physics']; ?></p>
    <p>Biology: <?php echo $_SESSION['biology']; ?></p>
    <p>Chemistry: <?php echo $_SESSION['chemistry']; ?></p>
    <p>Maths: <?php echo $_SESSION['maths']; ?></p>
    <p>Marathi: <?php echo $_SESSION['marathi']; ?></p>
    <p>English: <?php echo $_SESSION['english']; ?></p>

    <h3>Total and Percentage</h3>
    <p><strong>Total Marks:</strong> <?php echo $total; ?> / 600</p>
    <p><strong>Percentage:</strong> <?php echo number_format($percentage, 2); ?>%</p>
</body>
</html>
