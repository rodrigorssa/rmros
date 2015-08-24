<!DOCTYPE HTML>
<html>
<?php date_default_timezone_set('America/Sao_paulo');  include_once "php/verificalogin.php"; ?>
<head>
	<title>RMR.OS - ADMIN</title>
	<link rel="stylesheet" href="../../css/estilos.css" />
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/dataTables.responsive.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.min.css">
	<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../../js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="../../js/index_sem_ajax.js."></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script>
	$(document).ready(function(){


    $('table').DataTable({responsive:true});

	});
	</script>

	<meta charset="utf-8">
</head>
<body>

<?php include_once"./php/topo.php"; ?>

<section class="index">
<span class="aviso">*Para melhor visualização, utilizar modo paisagem.</span>
<div class="box box3">
	<div class="box_topo azul"><span>Lista de chamados</span></div>
	<table class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Data/hora chamado</th>
				<th>Status</th>
				<th>AÇÕES</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$tr=new chamados();

		$lista=$tr->getAll();

		foreach ($lista as $user) {
		 ?>
				<tr>
				<td><?= htmlspecialchars($user->id); ?></td>
				<td><?= date('d/m/Y H:i:s', strtotime($user->data_horainicio)); ?></td>
				<td><?php if($user->status==false) echo"Aberto"; else echo "Fechado"; ?></td>
				<td><form action="ver.php"  method="post">
					<input type="hidden" name="chamados" value="<?= $user->id ?>"/>
					<input type="hidden" name="id" value="<?= $user->id_user ?>"/>
				<input type="submit"  value="VER"/></form></td>
				
				
			</tr>
		
<?php } ?>
		</tbody>
	</table>
</div>
</section>
<div class="foot azul"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>