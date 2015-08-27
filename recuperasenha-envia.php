<?php 
date_default_timezone_set('UTC');
include_once 'class/Carrega.class.php';
include_once 'class/rb.class.php';
include_once 'class/DB.class.php';

R::selectDatabase('rmros');


//Condição para envio do e-mail
if (!isset($_POST['id-passwd'])) {

require("c:/apache24/htdocs/tcc/PHPMailer/class.phpmailer.php");


$email=$_POST['email'];

$data=R::getRow("SELECT * FROM users WHERE email='$email' LIMIT 1");

if($data==array()) die("E-mail, não encontrado");

$id_user=base64_encode($data['id']);

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

    $mail->SetFrom($mail->Username);
    
// Endereço de destino do email
    $mail->AddAddress($email); 

// Assunto e Corpo do email

    $mail->Subject = "RMR.OS - Recuperação de senha.";

    $mail->Body ="Para recuperar a senha <a href='http://localhost:3000/tcc/recuperasenha.php?token=".$id_user."'>Clique aqui</a>";

// Enviando o email

    $mail->Send();

}else{

if($_POST['pass1']!=$_POST['pass2']) die("Senhas incompatíveis, tente novamente.");

$senha=$_POST['pass1'];
$iduser=$_POST['id-passwd'];

$data=R::load("users",$iduser);

$data->senha=sha1($senha);

R::store($data);

echo"Senha alterada com sucesso.";

}

 ?>