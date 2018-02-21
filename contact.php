<?php
$errors = '';
$myemail = 'bramvdt@live.be';//
if(empty($_POST['naam'])  ||
   empty($_POST['email']) ||
   empty($_POST['bericht']))
{
    $errors .= "\n U moet alle velden invullen alvorens te kunnen versturen";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Onjuist geformatteerde e-mail";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Nieuw bericht (KSA): $name";
$email_body = "Nieuw bericht ontvangen!".
"Naam: $name \n ".
"Email: $email_address\n 
Bericht: \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);