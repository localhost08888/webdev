file1.php
<?php
session_start();

 
$correct_username = "admin";
$correct_password = "123";
 
if (!isset($_SESSION['attempts'])) 
{
    $_SESSION['attempts'] = 0;
}

 
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $correct_username && $password === $correct_password)
     {
 
        $_SESSION['attempts'] = 0;
        $_SESSION['loggedin'] = true;
        header("Location: file2.php");
        exit();
    } 
    else 
    {
        
        $_SESSION['attempts']++;
        
        if ($_SESSION['attempts'] >= 3)
         {
            $error_message = "You have exceeded the maximum number of login attempts!";
        } 
        else 
        {
            $error_message = "Invalid username or password! Attempts remaining: " . (3 - $_SESSION['attempts']);
        }
    }
}
?>

<!DOCTYPE html>
<html>
 >
<body>
    <h2>User Login</h2>

    <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>

    <?php if ($_SESSION['attempts'] < 3) { ?>
        <form method="post">
            <label>Username:</label>
            <input type="text" name="username" required><br><br>

            <label>Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    <?php } else { ?>
        <p>Login disabled. Please try again later.</p>
    <?php } ?>

</body>
</html>
======================================================
file2.php

<?php
session_start();

 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: file1.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, You are successfully logged in!</h2>
    <p>This is the second form that appears after successful login.</p>

    <!-- Logout Button -->
    <!-- <form method="post" action="logout.php">
        <input type="submit" value="Logout">
    </form> -->
</body>
</html>

