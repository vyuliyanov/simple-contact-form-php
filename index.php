<?php

define("DB_HOST", "localhost");
define("DB_NAME", "tut_db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

include('Database.php');

$db = new Database();

?>

<form method="POST">
    <input type="email" name="email" placeholder="Your email"><br>
    <input type="text" name="subject" placeholder="Subject"><br>
    <textarea name="message" rows="10" cols="60"></textarea><br>
    <input type="submit" name="send" value="Send">
</form>

<?php 
    if(isset($_POST['send'])){
        if(!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $insertData = array(
                'from_email' => $email,
                'subject' => $subject,
                'message' => $message,
                'sent_time' => time(),
                
            );

            $db->insert('emails', $insertData);
            mail('me@itsvalentin.com', $subject, $message);
        }
    }

?>