file1.php
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
</head>
<body>
    <h2>Enter Customer Details</h2>
    <form method="post" action="file2.php">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Address:</label>
        <input type="text" name="address" required><br><br>

        <label>Phone Number:</label>
        <input type="text" name="phone" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number"><br><br>

        <input type="submit" value="NEXT">
    </form>
</body>
</html>
=====================================
file2.php

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['phone'] = $_POST['phone'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Information</title>
</head>
<body>
    <h2>Enter Product Details</h2>
    <form method="post" action="file3.php">
        <label>Product Name:</label>
        <input type="text" name="product_name" required><br><br>

        <label>Quantity:</label>
        <input type="number" name="qty" required min="1"><br><br>

        <label>Rate (per unit):</label>
        <input type="number" name="rate" required min="1"><br><br>

        <input type="submit" value="GENERATE BILL">
    </form>
</body>
</html>
========================================
file3.php

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['product_name'] = $_POST['product_name'];
    $_SESSION['qty'] = $_POST['qty'];
    $_SESSION['rate'] = $_POST['rate'];

    // Calculate Total
    $_SESSION['total'] = $_SESSION['qty'] * $_SESSION['rate'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Bill</title>
</head>
<body>
    <h2>Customer Bill</h2>
    <h3>Customer Details:</h3>
    <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
    <p><strong>Address:</strong> <?php echo $_SESSION['address']; ?></p>
    <p><strong>Phone:</strong> <?php echo $_SESSION['phone']; ?></p>

    <h3>Product Details:</h3>
    <p><strong>Product Name:</strong> <?php echo $_SESSION['product_name']; ?></p>
    <p><strong>Quantity:</strong> <?php echo $_SESSION['qty']; ?></p>
    <p><strong>Rate (per unit):</strong> ₹<?php echo $_SESSION['rate']; ?></p>

    <h3>Total Bill Amount:</h3>
    <p><strong>Total:</strong> ₹<?php echo $_SESSION['total']; ?></p>

    <a href="file1.php">Start New Order</a>
</body>
</html>

<?php
 
session_destroy();
?>
