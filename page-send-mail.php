<?php
/*
Template Name: Page Send Mail
*/

$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$tel = $_REQUEST["tel"];
$subject = $_REQUEST["subject"];
$message = $_REQUEST["message"];

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $name <{$email}>" . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

$break = "\r\n";

$body = "";
$body .= "Nome: $name $break";
$body .= "E-mail: $email $break";
$body .= "Telefone: $tel $break";
$body .= "Mensagem: $message $break";

$to = "contato@francepanificacao.com.br";
$result = mail($to, $subject, $body);

$to = "brunocriacoes@regularswitch.com";
$result = mail($to, $subject, $body);

$to = "viniciusgalves@regularswitch.com";
$result = mail($to, $subject, $body);

$to = "recrutamento@francepanificacao.com.br";
$result = mail($to, $subject, $body);

$to = "marketing@francepanificacao.com.br";
$result = mail($to, $subject, $body);

$to = "mirismacedo@gmail.com";
$result = mail($to, $subject, $body);




