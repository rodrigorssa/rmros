<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; ?>
<head>
	<title>RMR.OS - ADMIN</title>
	<meta http-equiv="refresh" content="60">
	<link rel="stylesheet" href="../../css/estilos.css" />
	<link rel="stylesheet" href="../../css/normalize.css" />
	<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../js/index.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include_once "php/topo.php";  include_once "../../class/Carrega.class.php";


?>

<section class="index">

<div class="box box3">
	<h2>SELECIONE UM MENU ACIMA.</h2>
</div>

<span class="warn">Status do sistema:</span>

<div class="adj-box5">
<div class="box box5">
	<h2>Chamados: <span class="warn"><?= R::count("chamados")  ?></span></h2>
</div>

<div class="box box5">
	<h2>Chamados abertos: <span class="warn"><?= R::count("chamados","status=false")  ?></span></h2>
</div>

<div class="box box5">
	<h2>OS: <span class="warn"><?= R::count("os") ?></span></h2>
</div>

<div class="box box5">
	<h2>OS abertas: <span class="warn"><?= R::count("os","enc_os=false")  ?></span></h2>
</div>
</div>

</section>
<div class="foot azul"> <p class="p_foot">RMR.OS - Todos os direitos reservados. </p></div>
</body>
</html>