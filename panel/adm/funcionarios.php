<!DOCTYPE HTML>
<html>
<?php include_once '../../class/Carrega.class.php'; include_once "php/verificalogin.php";   ?>
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
	$(document).ready(function(){

    $('table').DataTable({
    	responsive:true });

	});
	</script>

</head>
<body>
<?php include_once "php/topo.php";  
if(isset($_POST['op']) && $_POST['op']=="tecnicos") {
	$a="tecnicos";
	$obj=new funcionarios($a);

	$lista=$obj->findNomes();

}
elseif(isset($_POST['op']) && $_POST['op']=="admins") {
	$a="admins";
	$obj=new funcionarios($a);

	$lista=$obj->findNomes();
}
?>

<section class="index">

<div class="box box3">
	<form action="" method="post">
		
	
	<h2>Selecione : <select name="op" onchange="this.form.submit()">
		<option value="">Selecione</option>
		<option value="tecnicos">TÉCNICOS</option>
		<option value="admins">ADMINISTRADORES</option>
		</select>
		</form>
</div>

<?php if(isset($_POST['op']) ){ ?>

<div class="box box3">
	<div class="box_topo azul"><span>Lista de usuários</span></div>
<form action="ver.php" method="post">
<input type="hidden" name="funcionarios" value="<?= $a ?>">
<span><input type="submit" class="" value="Adicionar novo" /></span>
</form>
	<table class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>AÇÃO</th>
			</tr>
		</thead>
		<tbody>
		<?php if($lista!=array()) { foreach ($lista as $user) {  
				$opp=($user['ativo']==false)? "class='opp'" : "";
				?>
				<tr <?= $opp ?>>
				<td><?= htmlspecialchars($user['id']); ?></td>
				<td><?= htmlspecialchars($user['nome'])." ".htmlspecialchars($user['sobrenome']); ?></td>
				<td><form action="ver.php"  method="post">
					<input type="hidden" name="funcionarios" value="<?= $a ?>"/>
					<input type="hidden" name="id" value="<?= $user['id'] ?>"/>
				<input type="submit"  value="VER"/></form></td>
				
				
			</tr>
		
<?php } } ?>
		</tbody>
	</table>
</div>
<?php } ?>
</section>
<div class="foot azul"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>