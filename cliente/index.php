<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; include_once '../class/Carrega.class.php'; include_once '../class/rb.class.php';?>
<head>
	<title>RMR.OS - Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/estilos.css" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../js/jspdf.min.js"></script>
	<script type="text/javascript" src="../js/index_sem_ajax.js"></script>
	
	<script type="text/javascript">

 $(document).ready(function(){
	        //form de ver a OS
        $('form').submit(function(e){
            e.preventDefault();
           var $form= $(this);
 			$('#listOS').fadeOut('fast');
           $.post(this.action,$form.serialize(),function(w){
           		$('#veros').fadeIn('slow');
           		$('#retorno').html(w);
           }).error('Ocorreu algum erro, tente mais tarde');
        }); 

    }); 


</script>


</head>
<body>

<?php include "php/topo.php";

$obj=new ordemServico();



 ?>

<section class="index">

<div class="box box3"><h3> Total de OS abertas: <span style="color:red"><?php echo htmlspecialchars($obj->countOpenOS($id)) ?></span></h3></div>
<div class="box box2" id="listOS">
	<div class="box_topo verde"><span> Lista de ordens de serviço ativas</span></div>

	<?php if($obj->countOpenOS($id)=="0") { ?>

	<h1>Que pena!</h1><span>Você não possui ordens de serviço ativas.</span>

	<?php }else{ $lista=$obj->getlistTable($id,"false"); ?>

	<div class="clb btn-pdd">

	<div class="circulo verde bdverde"></div><span class="b">OS concluída.</span> 
	
		<div class="circulo vermelho bdvermelho"></div><span class="b">OS condenada.</span>

		<div class="circulo bdverde"></div><span class="b">OS em aberto.</span>
	
		</div>

	<span class="aviso">*Para melhor visualização, utilizar modo paisagem do celular.</span>

	<?php foreach ($lista as $equip) { 

		switch ($equip['id_status']) {
			case '4':
				$classe="btn-ok";
				break;

				case '6':
				$classe="btn-cancel";
				break;

				case '5':
				$classe="btn-cancel";
				break;
				
			default:
				$classe="";
				break;
		}
		?>

		<div class="listar">

			<form action="php/veros.php" method="post" >
				<input type="hidden" name="os" value="<?= $equip['id'] ?>" />
				<input type="submit" class="bdverde <?= $classe ?>" value="<?= $equip['tipo']." ".$equip['marca']." ".$equip['ram']." ".$equip['hd']  ?>" />

			</form>
		</div>

		<?php }  ?>

		<?php } //fim if ?>
	</div>

<div class="box box3 hide" id="veros">
<div id="retorno"> <img src="../img/loading.gif" alt="loading..." ></div>

</div>
</section>
<div class="foot verde"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>