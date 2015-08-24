<?php 
include_once "../../class/Carrega.class.php";

if(!isset($_SESSION)) session_start();


$id=$_SESSION['tec'];

$obj= new funcionarios("tecnicos");

$user=$obj->retonly($id);

if(isset($_GET['logout'])){
	session_destroy();

	header("Location:../index.php");
}


 ?>


<header class="topo amarelo">
		<a href="./inicio.php"><img class="logo_rmr" src="../../img/logo.png"  alt="Logo_rmr.OS" /></a>

		<span class="nometopo">Bem vindo <?php  echo htmlspecialchars($user->nome); ?>. </span>
		<span id="menu" class="resptop menuresp"></span>
		<ul class="lista_top" id="lista-topo" >
			<li class="amarelo"><a target="_blank" href="./chat/">CHAT</a></li>
			<li class="amarelo"><a href="historico.php">HISTÓRICO</a></li>
			<li class="amarelo"><a href="os.php">OS</a></li>
			<li class="amarelo"><a href="chamados.php">CHAMADOS</a></li>
			<li class="amarelo"><a href="?logout">SAIR</a></li>
		</ul>
		
</header>
<div class="gambs"></div>
