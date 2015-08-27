 <!DOCTYPE HTML>
<html>
<head>
	<title>RMR.OS - Recupera senha </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/estilos.css" />
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<header class="topo verde">
		<a href="./"><img class="logo_rmr" src="img/logo.png" alt="Logo_rmr.OS" /></a>
		<span id="menu" class="resptop"></span>
		<ul class="lista_top" id="lista-topo">
			<li class="verde"><a href="empresa.html">A EMPRESA</a></li>
			<li class="verde"><a href="contato.php">CONTATO</a></li>
		</ul>
</header>
<div class="gambs"></div>

<section class="index ">

	<?php if(isset($_GET['token'])) { 
	$id_token=base64_decode($_GET['token']);
	?>

	<div class="box box4">
	<div class="box_topo verde"><span>Recuperar senha</span></div>
	
	<form action="recuperasenha-envia.php" class="form_index" style="position:relative" method="post">

			<label for="name">Senha:</label>
			<input type="password" name="pass1" required/>

			<label for="name">Confirme a senha:</label>
			<input type="password" name="pass2" required/>

			<input type="hidden" value="<?= $id_token ?>" name="id-passwd">
			<input type="submit" class="btn verde" value="Enviar" />

	</form>

</div>

<?php }else{ ?>

	<div class="box box4 ">
	<div class="box_topo verde"><span>Esqueceu a senha ?</span></div>
	<p class="warn">Digite seu e-mail para que possamos enviar uma nova senha.</p>
	<form action="recuperasenha-envia.php" class="form_index" style="position:relative" method="post" data-redirect="index.php">

			<label for="name">E-mail:</label>
			<input type="email" name="email" required/>

			<input type="submit" class="btn verde" value="Enviar" />

	</form>

</div>
<?php } ?>
</section>



<div class="foot verde"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>