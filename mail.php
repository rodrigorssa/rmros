<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer

include 'PHPMailer/class.phpmailer.php';

date_default_timezone_set('UTC');

// resgatando os dados passados pelo form

$nome = $_POST['nome'];

$email = $_POST['email'];

$mensagem = $_POST['mensagem'];



// instanciando a classe
    $mail = new PHPMailer();  
	
//  opção de idioma, setado como br	
    $mail->SetLanguage("br"); 

// habilitando SMTP	
    $mail->IsSMTP(); 

//     

// enviando como HTML

    $mail->IsHTML(true); 
	
// Pode ser também: 0 = não exibe erros, 1 = exibe erros e mensagens, 2 = apenas mensagens	
    $mail->SMTPDebug = 0;  
	
// habilitando autênticação	
    $mail->SMTPAuth = true;  
	
// habilitando tranferência segura (obrigatório)	
    $mail->SMTPSecure = 'ssl'; 


// Configurações para utilização do SMTP do Gmail  

    $mail->Host = 'smtp.gmail.com';

    $mail->Port = 465; // Porta de envio de e-mails do Gmail

    $mail->Username = 'burnshopcorporations@gmail.com';

    $mail->Password = 'burnshopsenha5';

    $mail->CharSet = "utf-8";

// Remetente da mensagem

    $mail->SetFrom($email);
	
// Endereço de destino do email
    $mail->AddAddress("burnshopcorporations@gmail.com"); 

// Assunto e Corpo do email

    $mail->Subject = "Email de ".$email."";

    $mail->Body ="Email de <b>".$nome." </b><br /><br />Mensagem: <br />" .$mensagem. "";

// Enviando o email

    $mail->Send();
