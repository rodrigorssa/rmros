<?php 

include_once "class/Carrega.class.php";
include_once 'class/rb.class.php';
include_once 'class/DB.class.php';

R::selectDatabase("rmros");

$opcao = $_POST['opcao'];
// VERIFICAR EMAIL
if($opcao=="email"){

	$email=$_POST['email'];
	$dados=R::getCol("SELECT email FROM users where email= '$email'");
if($dados!=array()){ die("Selecione outro email.");}
return;
}

//VERIFICAR LOGIN
if($opcao=="login"){

$login=$_POST['login'];
$dados=R::getCol("SELECT login FROM users where login= '$login'");

if($dados!=array()){ die("Selecione outro usuário."); }
return;
}
?>