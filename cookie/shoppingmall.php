file1.php
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page1_total = 0;

    // Calculate page total
    if (isset($_POST['items'])) {
        foreach ($_POST['items'] as $price) {
            $page1_total += (int)$price;
        }
    }

    $_SESSION['page1_total'] = $page1_total;

    // Redirect to Page 2
    header("Location: file2.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
 
<body>
    <h1>Shopping Mall - Page 1</h1>
    <form method="POST">
        Shoes  $1000 : <input type="checkbox" name="items[]" value="1000"> <br><br>
        Bag    $1200 : <input type="checkbox" name="items[]" value="1200"> <br><br>
        Shirt   $600 : <input type="checkbox" name="items[]" value="600"> <br><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>
==========================================

file2.php

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $page2_total = 0;

    
    if (isset($_POST['items'])) 
    {
        foreach ($_POST['items'] as $price)
         {
            $page2_total += (int)$price;
        }
    }

 
    $_SESSION['page2_total'] = $page2_total;
 
    header("Location: file3.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
 
<body>
    <h1>Shopping Mall - Page 2</h1>
    <form method="POST">
        Watch  $1500 : <input type="checkbox" name="items[]" value="1500"> <br><br>
        Hat     $500 : <input type="checkbox" name="items[]" value="500"> <br><br>
        Belt    $700 : <input type="checkbox" name="items[]" value="700"> <br><br>
        <input type="submit" value="View Bill">
    </form>
</body>
</html>
 
=============================================
file3.php
<?php
session_start();
 
$page1_total = isset($_SESSION['page1_total']) ? $_SESSION['page1_total'] : 0;
$page2_total = isset($_SESSION['page2_total']) ? $_SESSION['page2_total'] : 0;

 
$grand_total = $page1_total + $page2_total;
 
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Mall - Bill</title>
</head>
<body>
    <h1>Shopping Mall - Bill</h1>
    <p>Page 1 Total: $<?php echo $page1_total; ?></p>
    <p>Page 2 Total: $<?php echo $page2_total; ?></p>
    <hr>
    <h2>Grand Total: $<?php echo $grand_total; ?></h2>
</body>
</html>
