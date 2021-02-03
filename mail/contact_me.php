<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

	ini_set("SMTP", "aspmx.l.google.com");
    ini_set("sendmail_from", "YOURMAIL@gmail.com");

// Create the email and send the message
$to = 'yensaothanhnha@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";

$email = new \SendGrid\Mail\Mail();
$email->setFrom($headers);
$email->setSubject($email_subject);
$email->addTo($to);
$email->addContent("text/plain", $email_body);
);
$sendgrid = new \SendGrid('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');

mail($to,$email_subject,$email_body,$headers);
return true;			
?>