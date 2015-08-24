<!DOCTYPE HTML>
<html>
<?php date_default_timezone_set('America/Sao_paulo');  include_once "php/verificalogin.php"; ?>
<head>
	<title>RMR.OS - Chamados</title>
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


//form para selecionar usuario
$('.form').submit(function(e){
	e.preventDefault();
	var $form= $(this);
	$('#retorno').show();
	$.post(this.action,$form.serialize(),function(w){

		$('#retorno').html(w);
	});
});

$('#novoCH').click(function(){

	$('#newcliente').fadeToggle('slow');

});

$('#listarCH').click(function(){

	$('#listaCH').fadeToggle('slow');

});

$('table').DataTable({responsive:true});

});
	</script>

	<meta charset="utf-8">
</head>
<body>

	<?php include_once"./php/topo.php"; ?>

	<section class="index">
		<span class="aviso">*Para melhor visualização, utilizar modo paisagem.</span>
		<div class="box box4">
			<div class="box_topo amarelo"><span>AÇÕES:</span></div>
			<a class='btn amarelo btn-submenu' id="novoCH">NOVO</a> <a id="listarCH" class='btn amarelo btn-submenu'>LISTAR</a>
		</div>

		<div class="box box4 hide" id="newcliente" >
			<div class="box_topo amarelo"><span>Selecione o cliente:</span><div class="close">X</div></div>
			<form action="php/pcliente.php" method="post" class="form">

				<label for="name">Nome do cliente:</label>
				<input type="text" name="nome" id="name"  required/>
				<input type="hidden" name="ch">
				<input type="submit" class="btn amarelo btn-submenu" style="top:0" value="Pesquisar" />

			</form>

			<div id="retorno" class="hide"><img src="../../img/loading.gif" alt="Loading" /></div>


		</div>
		<div class="box box3 hide" id="newCH">

			<div id="retorno2"></div>

		</div>

		<div class="box box3 hide" id="listaCH">
			<div class="box_topo amarelo"><span>Lista de chamados abertos.</span><div class="close">X</div></div>
			<table class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Data/hora chamado</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$tr=new chamados();

					$lista=$tr->getAll("status=false AND id_tecnico='".$id."'");

					foreach ($lista as $user) {
						?>
						<tr>
							<td><?= htmlspecialchars($user->id); ?></td>
							<td>
								<div class="listar">
									<form action="ver.php"  method="post">
										<input type="hidden" name="chamados" value="<?= $user->id ?>"/>
										<input type="hidden" name="id" value="<?= $user->id_user ?>"/>
										<input type="submit" class="bdamarelo"  value="<?= date('d/m/Y H:i:s', strtotime($user->data_horainicio)); ?>"/></form></td>
									</div>

								</tr>

								<?php } ?>
							</tbody>
						</table>
					</div>
				</section>
				<div class="foot amarelo"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
			</body>
			</html>