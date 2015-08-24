<?php 
include_once "../../class/Carrega.class.php";

if(!isset($_SESSION)) session_start();


$id=$_SESSION['adm'];

$obj= new funcionarios("admins");

$user=$obj->retonly($id);

if(isset($_GET['logout'])){
	session_destroy();

	header("Location:../index.php");
}


 ?>


<header class="topo azul">
		<a href="./inicio.php"><img class="logo_rmr" src="../../img/logo.png"  alt="Logo_rmr.OS" /></a>

		<span class="nometopo">Bem vindo <?php  echo htmlspecialchars($user->nome); ?>. </span>
		<span id="menu" class="resptop menuresp"></span>
		<ul class="lista_top small" id="lista-topo" >
			<li class="azul"><a target="_blank" href="./chat">CHAT</a></li>
			<li class="azul"><a href="os.php">OS</a></li>
			<li class="azul"><a href="clientes.php">CLIENTES</a></li>
			<li class="azul"><a href="funcionarios.php">FUNCIONÁRIOS</a></li>
			<li class="azul"><a href="chamados.php">CHAMADOS</a></li>
			<li class="azul"><a href="?logout">SAIR</a></li>
		</ul>
		
</header>
<div class="gambs"></div>
