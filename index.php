 <!DOCTYPE HTML>
<html>
<?php //VERIFICA SE JÁ ESTÁ LOGADO
 session_start(); if(isset($_SESSION['user'])) { ?>
<script type="text/javascript">alert("Você já está logado");
window.location="cliente/";</script>
<?php  } ?>
<head>
	<title>RMR.OS - </title>
	<link rel="stylesheet" href="css/estilos.css" />
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">


</head>
<body>


<header class="topo verde">
		<img class="logo_rmr" src="img/logo.png" alt="Logo_rmr.OS" />
		<span id="menu" class="resptop"></span>
		<ul class="lista_top" id="lista-topo">
			<li class="verde"><a href="empresa.html">A EMPRESA</a></li>
			<li class="verde"><a href="contato.php">CONTATO</a></li>
		</ul>
</header>
<div class="gambs"></div>


<section class="index fll ">
	<div class="box-home">
	<div class="box box1">
	<div class="box_topo verde"><span>Não possui cadastro?</span></div>
	<a id="cadastro" class="btn_3 verde box_centro">CADASTRO</a>

	<?php	 $direct="cliente/index.php?"; $action="cadastro.php"; include_once"form-cad1.php";   ?>
</div>
</div>
</section>



<section class="index fll">
	<div class="box-home">
	<div class="box box1">
<div class="box_topo verde"><span>Já é nosso cliente?</span></div>
	<a  id ="login" class="btn_3 verde box_centro">LOGIN</a>


	<form action="login.php" method="post" id="cdlogin" class="form_index hide" id="formlogin" data-redirect="cliente/index.php">
		
		<label for="user">Usuario:</label>
		<input type="text" id="user" name="user" placeholder="Nome de usuário" required/>

		<label for="pass">Senha:</label>
		<input type="password" id="pass" name="pass" placeholder="Senha" required/>

		<input type="submit" id="btnlogin" class="btn verde" value="Entrar" />

		<a href="recuperasenha.php" class="warn">Esqueceu a senha ?</a>
		<!--<button type="submit"  id="btnlogin" class="btn_2 verde" />Entrar</button>-->
	</form>

	
</div>
</div>
</section>

<div class="foot verde"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>