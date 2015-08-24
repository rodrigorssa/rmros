<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; include_once '../../class/Carrega.class.php';?>
<head>
	<title>RMR.OS - ADMIN</title>
	<link rel="stylesheet" href="../../css/estilos.css" />
	<link rel="stylesheet" href="../../css/normalize.css" />
	<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../js/index_sem_ajax.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include_once "php/topo.php"; ?>

<section class="index">

<div class="box box4">
	
	<?php // PARA NOVO EQUIPAMENTO 
		if (isset($_GET['idCl'])){  include_once 'php/formadm4.php'; }

		//PARA EXIBIR
		if (isset($_POST['id'])){  include_once 'php/formadm4.php'; }

      //PARA LISTAR EQUIPAMENTOS

		 if (isset($_GET['list'])){  

		 $id=$_GET['list'];

		 $equips= new equipamentos();

		 $lista=$equips->meusequips($id);


		 if ($lista==array()) { ?>
		 <p><span class="warn clb">Nada encontrado.</span></p>
		 <a href="equipamentos.php?idCl=<?= $id  ?>" class="btn amarelo btn-pdd" >NOVO EQUIPAMENTO</a>


		 <?php die();  } ?>
		<div class="box_topo amarelo"><span>Lista de equipamentos</span></div>
		  
		 <?php foreach ($lista as $equip) { ?>
		 	
		 	<div class="listar">

		 		<form action="equipamentos.php" method="post" >
		 			<input type="hidden" value="<?= $equip['id'] ?>" name="id" />
		 				<input type="submit" class="bdamarelo" value="<?= $equip['tipo']." ".$equip['marca']." ".$equip['ram']." ".$equip['hd']  ?>" />
		 
		 		</form>

		 	</div>
		

		<?php }  } ?>
</div>

</section>
<div class="foot amarelo"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>