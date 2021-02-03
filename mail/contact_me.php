<?php
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

require '../vendor/autoload.php';

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'yensaothanhnha@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Liên hệ mới từ:  $name";
$email_body = "Bạn nhận được 1 tin nhắn mới từ người dùng website.\n\n"."Tên:\n\nName: $name\n\nEmail: $email_address\n\nNội dung:\n$message";

$email = new \SendGrid\Mail\Mail();
$email->setFrom("yensaothanhnha@gmail.com", "User from yensaothanhnha.com");
$email->setSubject($email_subject);
$email->addTo("yensaothanhnha@gmail.com", "No-reply");
$email->addContent("text/plain", $email_body);
$sendgrid = new \SendGrid('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');
$response = $sendgrid->send($email);

console.log($response);


return true;
?>