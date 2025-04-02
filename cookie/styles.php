file1.php

<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
    <h2>Preference's Choice</h2>

    <form method="post">
        Font Style : <select name="font_style">
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Courier New">Courier New</option>
        </select> <br><br>

        Font Size : <select name="font_size">
            <option value="12px">12px</option>
            <option value="16px">16px</option>
            <option value="20px">20px</option>
            <option value="24px">24px</option>
        </select> <br><br>

        Font Color : <input type="color" name="font_color"> <br> <br>

        Background Color : <input type="color" name="bgcolor"> <br> <br>

        <input type="submit" name="submit" value="Save Preferences">
    </form>
</body>
</html>

<?php

if(isset($_POST['submit'])) 
{

    setcookie('font_style',$_POST['font_style'], time()+(60*60),'/');
    setcookie('font_size',$_POST['font_size'], time()+(60*60),'/');
    setcookie('font_color',$_POST['font_color'], time()+(60*60),'/');
    setcookie('bgcolor',$_POST['bgcolor'], time()+(60*60),'/');

    header("Location: file2.php");
    exit();
}

?>
==============================================================
file 2.php

<?php

$style = $_COOKIE['font_style'];
$size = $_COOKIE['font_size'];
$color = $_COOKIE['font_color'];
$bgcolor = $_COOKIE['bgcolor'];

?>

 
<!DOCTYPE html>
<html>
 
<body>
	<h1>Your Selected Preferences</h1>
	<p><strong>Font Style : </strong><?php echo htmlspecialchars($style);?></p>
	<p><strong>Font Size  : </strong><?php echo htmlspecialchars($size);?></p>
	<p><strong>Color      : </strong><?php echo htmlspecialchars($color);?></p>
	<p><strong>Background : </strong><?php echo htmlspecialchars($bgcolor);?></p>

	<form method="post">
		<input type="submit" name="apply" name="APPLY">
	</form>

</body>
</html>

<?php

if(isset($_POST['apply']))
 {

	header("Location: file3.php");
}

?>
================================================
file3.php

<?php

$style = $_COOKIE['font_style'];
$size = $_COOKIE['font_size'];
$color = $_COOKIE['font_color'];
$bgcolor = $_COOKIE['bgcolor'];

?>

 
<!DOCTYPE html>
<html>
<head>
	 
	<style>
		body {
			font-family: <?php echo htmlspecialchars($style); ?>;
			font-size: <?php echo htmlspecialchars($size); ?>;
			color: <?php echo htmlspecialchars($color); ?>;
			background-color: <?php echo htmlspecialchars($bgcolor); ?>;
		}
	</style>
</head>
<body>
	<h1>Preferneces Are Applied</h1>
	<p>Hello wordld<p>
</body>
</html>
