<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; ?>
<head>
	<title>RMR.OS - ADMIN</title>
	<link rel="stylesheet" href="../../css/estilos.css" />
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/dataTables.responsive.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.min.css">
	<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../../js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="../../js/index.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script>
	$(document).ready(function(){


    $('table').DataTable({
    	responsive:true });

	});
	</script>

	<meta charset="utf-8">
</head>
<body>

<?php include_once"./php/topo.php"; ?>

<section class="index">
<span class="aviso">*Para melhor visualização, utilizar modo paisagem.</span>
<div class="box box3">
	<div class="box_topo azul"><span>Lista de clientes</span></div>
	<table class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Sobrenome</th>
				<th>CPF</th>
				<th>AÇÕES</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$tr=new users();
		$lista=$tr->getAll();
		$td= new compusers();

		foreach ($lista as $user) {
			$cpf=$td->retonly($user->id);

		 ?>
		
			<tr>
				<td><?= htmlspecialchars($user->nome); ?></td>
				<td><?= htmlspecialchars($user->sobrenome); ?></td>
				<td><?php if($cpf!=array()) echo htmlspecialchars($cpf->cpf); ?></td>
				<td><a href="ver.php?id=<?= $user->id; ?>">VER</a></td>
			</tr>
<?php } ?>
		</tbody>
	</table>
</div>
</section>
<div class="foot azul"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>