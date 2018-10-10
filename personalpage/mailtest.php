<?php 
# /bitnami/lamp71stack-linux-x64/output/php/lib/php
set_include_path('/bitnami/lamp71stack-linux-x64/output/php/lib/php');
require_once "Mail.php";
ini_set('display_errors',1);
// Check for empty field
   
#	$name = strip_tags(htmlspecialchars($_POST['name']));
#	$email_address = strip_tags(htmlspecialchars($_POST['email']));
#	$phone = strip_tags(htmlspecialchars($_POST['phone']));
#	$message = strip_tags(htmlspecialchars($_POST['message']));
	
	/*$to = 'siyunl@g.clemson.edu'; 
	$email_subject = 'Website Contact Form Message From ' . $name;
	$email_body = "You have received a new message from your website contact form.\r\n"."Here are the details:\r\nName: $name\r\nEmail: $email_address\r\nPhone: $phone\r\nMessage:\r\n$message";
	$headers = 'From: siyunl@g.clemson.edu'."\r\n".'Reply-To: $email_address'."\r\n".'X-Mailer: PHP/'.phpversion();*/

/*	$to = "zwan@mailinator.com";
	$email_subject = "Website Contact Form Message";
	$email_body = "HeyheyTest";
	$headers = 'From: siyunl@g.clemson.edu'."\n".'Reply-To: lsylsychq88@gmail.com'."\n".'X-Mailer: PHP/'.phpversion();
	$result = mail($to,$email_subject,$email_body);
	echo $result;  */

$from = "sherrypersonalpage@gmail.com";
$to = 'zwan@g.clemson.edu';

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = 'sherrypersonalpage@gmail.com';
$password = 'sherrypersonal';

$subject = "nihao";
$body = "nihao";

$headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo($mail->getMessage());
} else {
  echo("Message successfully sent!\n");
}
?>
