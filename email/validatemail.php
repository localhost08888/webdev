<!DOCTYPE html>
<html  >
<head>
    
    <title>Email Validation</title>
    <style>
         
    </style>
</head>
<body>
    <div class="container">
        <h2>Email Validation</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="submit" value="Validate">
        </form>

        <div class="result">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
             {
                $email = $_POST['email'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                 {
                    echo "<span style='color:green;'>$email is a valid email address.</span>";
                } else {
                    echo "<span style='color:red;'>$email is not a valid email address.</span>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
