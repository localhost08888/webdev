file1.html

<!DOCTYPE html>
<html>
<head>
	 
</head>
<body>
	<h2>Email Details</h2>
	<form action="file2.php" method="post">
		Enter Detail's For E-mail <Br>
		From : <input type="email" name="from" required> <br> <br>
		To : <input type="email" name="to" required> <br> <br>
		Subject : <input type="text" name="subject" required> <br> <br>
		Text : <textarea name="text" required></textarea>

		<input type="submit" name="send" value="SEND">	<br> <br>	<hr>
	</form>
</body>
 </html>
======================================
file2.php


<?php
if(isset($_POST['send'])) 
{
    $from = filter_var($_POST['from'], FILTER_SANITIZE_EMAIL);
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
    $text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');

    if(filter_var($to, FILTER_VALIDATE_EMAIL) && filter_var($from, FILTER_VALIDATE_EMAIL)) 
    {
        $headers = "From: $from\r\nReply-To: $from\r\nX-Mailer: PHP/" . phpversion();

        if(mail($to, $subject, $text, $headers)) 
        {
            echo "Email sent Successfully!";
        } 
        else
         {
            echo "Email has not been sent!";
        }
    } 
    else 
    {
        echo "Invalid Email Address";
    }
}
 else 
 {
    echo "Invalid Request!";
}
?>
