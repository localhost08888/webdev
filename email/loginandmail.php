file1.html

<!Doctype html>
<html>
<head>
	<title>here we go</title>
</head>
<body>
	<h2>To:xcx@gmail.com</h2>
 	<h2>From:vcv@gmail.com</h2>
        <h2>Subject:regarding leave</h2>
        <h2>Message:i want a leave tomorrow</h2>
</body>
 
===================================================
file2.php

 
<!DOCTYPE html>
<html>
<head>
	 
 
</head>
<body>
	<h2>Login User</h2>
	<form method="post">
		username : <input type="text" name="name" required> <br> <br>
		Password : <input type="password" name="pass" required> <br> <br>
		<input type="submit" name="submit" value="LOGIN"> <br> <br> <hr> <br>
	</form>
</body>
</html>

<?php

if(isset($_POST['submit'])) 
{

	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if($name == "xyz" && $pass== "123") 
	{

		header("Location: file1.html");
		exit();
	}
	else
	 {
		echo "<big><b>Login Failed !</b></big>";
	}
}

?>
