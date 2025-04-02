<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
    <h2>Email Details</h2>
    <form method="post" enctype="multipart/form-data">
        Enter Detail's For E-mail <br>
        From : <input type="email" name="from" value="avfff@gmail.com" required> <br> <br>
        To : <input type="email" name="to" required> <br> <br>
        Subject : <input type="text" name="subject" required> <br> <br>
        Text : <textarea name="text" required></textarea> <br> <br>
        Attach File : <input type="file" name="file"> <br> <br>
        <input type="submit" name="send" value="SEND"> <br> <br> <hr>
    </form>
</body>

<?php

if(isset($_POST['send']))
 {

    
    $from = $_POST['from'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $file = $_FILES['file'];

     
    if($file['error'] == 0)
     {

         
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $file_data = file_get_contents($file_tmp_name);
        $encoded_file = base64_encode($file_data);
        $file_type = $file['type'];

        
        $boundary = md5(time());

       
        $headers = "From: $from\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

        
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $text . "\r\n\r\n"; 

         
        $body .= "--$boundary\r\n";
        $body .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n";
        $body .= $encoded_file . "\r\n";
        $body .= "--$boundary--";  
         
        if (mail($to, $subject, $body, $headers))
         {
            echo "Email sent successfully!";
        }
         else 
         {
            echo "Failed to send email.";
        }
    } 
    else 
    {
        echo "Error uploading file.";
    }
}
?>
