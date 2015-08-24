<!DOCTYPE HTML>
<html>
<?php //VERIFICA SE JÁ ESTÁ LOGADO
 session_start(); if(isset($_SESSION['adm'])) { ?>
<script type="text/javascript">alert("Você já está logado");
window.location="adm/inicio.php";</script>
<?php  } ?>
<head>
	<title>RMR.OS - ADMIN</title>
	<link rel="stylesheet" href="../css/estilos.css" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="topo azul">
		<a href="index.php"><img class="logo_rmr" src="../img/logo.png"  alt="Logo_rmr.OS" /></a>

</header>
<div class="gambs"></div>

<section class="index">

<div class="box"style="width:100%">
<div class="box_topo azul"><span>Área do Administrador</span></div>
 	<form action="loginadm.php" method="post" id="cdlogin" class="form_index" id="formlogin" data-redirect="adm/inicio.php">
		
		<label for="user">Usuario:</label>
		<input type="text" id="user" name="user" placeholder="Nome de usuário" required/>

		<label for="pass">Senha:</label>
		<input type="password" id="pass" name="pass" placeholder="Senha" required/>
	
		<input type="hidden" name="adm">

		<input type="submit" id="btnlogin" class="btn btn_large  azul" value="Entrar" />

		
		
		
	</form>

	<span class="warn hide">Carregando...</span>

</div>
</section>
<div class="foot azul"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>