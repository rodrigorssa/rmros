<?php
require_once"../../../class/Carrega.class.php";

$cliente= new users();

$retorno=$cliente->retonly($obj->id_cliente);

$name = $retorno->nome;
$email_address = $retorno->email;
$quebra_linha="\n";
$emailsender = "donotreply@".$_SERVER[HTTP_HOST];
// Create the email and send the message
$to = 'rodrigo.m.rosa@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "RMR.OS - $name ,seu equipamento está pronto!";
$email_body = "<p>O equipamento que você solicitou reparo está pronto, acesse o <a href='www.rodrigomrosa.com.br/portfolio/tcc'>site</a> para conferir. </p>";


/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
// Se não houver um valor, o item não deverá ser especificado.
if(strlen($comcopia) > 0) $headers .= "Cc: ";
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ";
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
 
/* Enviando a mensagem */
mail($to, $email_subject, $email_body, $headers, "-r". $emailsender);

?>