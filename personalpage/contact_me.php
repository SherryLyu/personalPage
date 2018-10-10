<?php
	set_include_path('/bitnami/lamp71stack-linux-x64/output/php/lib/php');
	require_once "Mail.php";
	// Check for empty fields
	if(empty($_POST['name'])      ||
  	   empty($_POST['email'])     ||
 	   empty($_POST['message'])   ||
   	   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   	{
		echo "No arguments Provided!";
		return false;
	}
   
	$name = strip_tags(htmlspecialchars($_POST['name']));
	$email_address = strip_tags(htmlspecialchars($_POST['email']));
	$phone = strip_tags(htmlspecialchars($_POST['phone']));
	$message = strip_tags(htmlspecialchars($_POST['message']));
	
	$to = 'siyunl@g.clemson.edu';
	$email_subject = 'Website Contact Form Message From '.$name;
	$email_body = "You have received a new message from your website contact form.\r\n"."Here are the details:\r\n- Name: $name\r\n- Email: $email_address\r\n- Phone: $phone\r\n- Message: $message";
	$msg = wordwrap($email_body,70);

	$from = "sherrypersonalpage@gmail.com";
	$host = "ssl://smtp.gmail.com";
	$port = "465";
	$username = 'sherrypersonalpage@gmail.com';
	$password = 'sherrypersonal';

	$subject = $email_subject;
	$body = $msg;

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
	return true;
?>
