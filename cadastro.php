<?php 

require_once "/class/Carrega.class.php";



if(!isset($_SESSION)) session_start();


if(!isset($_GET['comp'])){

$nome= isset($_POST['nome']) ? $_POST['nome'] : '';
$sobre= isset($_POST['sobre']) ? $_POST['sobre'] : '';
$user= isset($_POST['user']) ? $_POST['user'] : '';
$pass= isset($_POST['pass']) ? $_POST['pass'] : '';
$mail= isset($_POST['mail']) ? $_POST['mail'] : '';

include_once 'valida-cadastro.php';

$obj= new users();

	$obj->nome=$nome;
	$obj->sobrenome=$sobre;
	$obj->email=$mail;
	$obj->login=$user;
	$obj->senha=sha1($pass);
	


if(isset($_GET['atualizar']) && $_GET['atualizar']=='1') {

	$obj->id=$_POST['id'];
	$id=$obj->atualizar($obj);

}

else $id=$obj->inserir();

$_SESSION['user']=$id;

}

if(isset($_GET['comp'])){

include_once 'valida-cpf.php';


$id= isset($_POST['id']) ? $_POST['id'] : '';
$rg= isset($_POST['rg']) ? $_POST['rg'] : '';
$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : '';
$endereco= isset($_POST['endereco']) ? $_POST['endereco'] : '';
$numero= isset($_POST['numero']) ? $_POST['numero'] : '';
$comp= isset($_POST['comp']) ? $_POST['comp'] : '';
$telefone= isset($_POST['telefone']) ? $_POST['telefone'] : '';
$bairro= isset($_POST['bairro']) ? $_POST['bairro'] : '';


$obj= new compusers();

	$obj->id=$id;
	$obj->rg=$rg;

	//valida CPF
	if(validaCPF($cpf))	$obj->cpf=$cpf; else die("Digite um CPF válido.");
	
	$obj->endereco=$endereco;
	$obj->numero=$numero;
	$obj->complemento=$comp;
	$obj->bairro=$bairro;
	$obj->telefone=$telefone;

	
	if($_GET['comp']=='2') $obj->atualizar($obj->id);

	else $obj->inserir();

}

 ?>