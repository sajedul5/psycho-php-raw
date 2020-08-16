<?php

function sendEmail ($emailFrom,$emailTo,$subject, $msg)
{

  //Include necessary script
  require 'PHPMailerAutoload.php';
  //Create an object
  $mail = new PHPMailer();
  //Enable SMTP
  $mail->IsSMTP();
  /* You can use the following debug option to find out any email sending error.
  Here, 1 = errors and messages,
  2 = messages only*/
  //$mail->SMTPDebug = 2;
  //Enable authentication
  $mail->SMTPAuth = true;
  //Enable secure transfer
  $mail->SMTPSecure = 'tls';
  //$mail->SMTPAutoTLS = false;
  //Set SMTP host name
  $mail->Host = 'smtp.gmail.com';
  //Set SMTP port
  $mail->Port = 587;

  //Setup the following configuration for smtp authentication
/*
  $mail->SMTPOptions = array(
  'ssl' => array(
  'verify_peer' => false,
  'verify_peer_name' => false,
  'allow_self_signed' => true
  )
  );
*/
//Set your gmail email address as SMTP username
$mail->Username = 'sajedul.idb@gmail.com';
//Set your email password as SMTP password
$mail->Password = 'idb546si';

//Set the sender address
$mail->setFrom($emailFrom, '1me!');
//Set the reply address
$mail->addReplyTo($emailFrom, '1me!');
//Set the recipient address
$mail->addAddress($emailTo);

/* You can set CC and BCC address by using the following functions

$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

*/

//Set the subject of the email
$mail->Subject = $subject;
//Set the message of the email
$mail->Body = $msg;
//Call send() function to send the email
$mail->send();
/*
if(!$mail->send()) {
echo 'Email is not sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Email has been sent';
}*/
}
?>
