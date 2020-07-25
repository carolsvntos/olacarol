<?php

if(!empty($_POST['email2'])) {

	echo "<script type=\"text/javascript\">alert(\"nah\");</script>";

} else { 

	$name = $_POST['name'];

	$email = $_POST['email'];

	$message = $_POST['message'];

	$formcontent="From: $name \n Message: $message";

	$recipient = "hey@olacarol.com.br";

	$subject = "Contact Form";

	$mailheader = "From: $email \r\n";

	mail($recipient, $subject, $formcontent, $mailheader) or die("<script type=\"text/javascript\">alert(\"Tente novamente!\");</script>");

	echo "<script type=\"text/javascript\">alert(\"Obrigada!\");</script>";


 }

 ?>


<?php 

header('refresh: 1; url=https://olacarol.com.br/contato'); 

?> 