login1.php

<!Doctype Html>
<html>
<body>
	<?php
	if (isset($_GET['message'])) {
		echo "<p style='color: red;'>" . htmlspecialchars($_GET['message']) . "</p>";
	}
	?>
	<form method="post">
		<input type="text" name="user" placeholder="Enter name"> <br> <br>
		<input type="password" name="psw" placeholder="Password"> <br> <br>
		<input type="submit" name="submit" value="Login"> <br> <br>
	</form>

	<?PHP
	session_start();

	if (isset($_POST['submit'])) {

		$user = $_POST['user'];
		$psw = $_POST['psw'];

		if ($user === "xyz" && $psw === "123") {

			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $user;
			$_SESSION['start_time'] = time();

			header("Location: login2.php");
			exit();
		} else {
			echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
		}
	}
	?>

</body>

</html>

============================================================
login2.php

<?php

session_start();
/*
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	header("Location: login1.php?message=Please log in first.");
	exit();
}*/

$timeout_duration = 30; 
$current_time = time();

if (isset($_SESSION['start_time']) && ($current_time - $_SESSION['start_time']) > $timeout_duration)
 {
	 
	session_unset();
	session_destroy();
	header("Location: login1.php?message=Session expired. Please log in again."); // Redirect to login
	exit();
}

$_SESSION['start_time'] = $current_time;

?>

<!DOCTYPE html>
<html>
 
<body>
	<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
	<p>Here you can enter your details.</p>
	<form method="post">
		Name  :	<input type="text" name="name" required><br><br>
		City  :	<input type="text" name="city" required><br><br>
		Phone :	<input type="text" name="phone" required><br><br>
		<input type="submit" name="Submit">	
	</form>

<?php

if(isset($_POST['Submit'])) {

 $name = $_POST['name'];
 $city = $_POST['city'];
 $phone = $_POST['phone'];

 // Process the user details (for now, we just display them)
 echo "<h3>Details Submitted:</h3>";
 echo "Name: " . htmlspecialchars($name) . "<br>";
 echo "City: " . htmlspecialchars($city) . "<br>";
 echo "Phone: " . htmlspecialchars($phone) . "<br>";

 
echo "<p> <a href='login1.php'>Logout</a></p>";
}

?>

</body>
</html>
