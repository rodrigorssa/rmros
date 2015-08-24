<?php 
include_once "../class/Carrega.class.php";

if(!isset($_SESSION)) session_start();

$id=$_SESSION['user'];

$obj= new users();

$user=$obj->retonly($id);

if(isset($_GET['logout'])){
	session_destroy();

	header("Location:../index.php");
}



 ?>


<header class="topo verde">
		<a href="./index.php"><img class="logo_rmr" src="../img/logo.png"  alt="Logo_rmr.OS" /></a>
		<span class="nometopo">Bem vindo <?php echo htmlspecialchars($user->nome); ?>. </span>
		<span id="menu" class="resptop menuresp"></span>
		<ul class="lista_top" id="lista-topo" >
			<li class="verde"><a target="_blank" href="../cliente/chat/">CHAT</a></li>
			<li class="verde"><a href="../cliente/historico.php">HISTÓRICO</a></li>
			<li class="verde"><a href="../cliente/meusdados.php">MEUS DADOS</a></li>
			<li class="verde"><a href="../cliente/chamado.php">CHAMADO</a></li>
			<li class="verde"><a href="?logout">SAIR</a></li>
		</ul>
		
</header>
<div class="gambs"></div>
