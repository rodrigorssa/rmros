<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; include_once '../../class/Carrega.class.php'; include_once '../../class/rb.class.php';?>
<head>
	<title>RMR.OS - Histórico</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/estilos.css" />
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/dataTables.responsive.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.min.css">
	<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../../js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="../../js/index_sem_ajax.js"></script>
	<script>
 $(document).ready(function(){

 				

 		        //form de ver a OS
        $('.formos').submit(function(e){
            e.preventDefault();
           var $form= $(this);
 			$('#listOS').fadeOut('fast');
           $.post(this.action,$form.serialize(),function(w){
           		$('#veros').fadeIn('slow');
           		$('#retorno').html(w);
           }).error('Ocorreu algum erro, tente mais tarde');
        }); 

        //form de ver o chamado
                $('.formCH').submit(function(e){
            e.preventDefault();
           var $form= $(this);
 			$('#listCH').fadeOut('fast');
           $.post(this.action,$form.serialize(),function(w){
           		$('#verCH').fadeIn('slow');
           		$('#retornoCH').html(w);
           }).error('Ocorreu algum erro, tente mais tarde');
        }); 
$('table').DataTable({responsive:true});

    }); 

	</script>
</head>
<body>

<?php include "php/topo.php";

$obj=new ordemServico();

$id=$_GET['tec'];

 ?>

<section class="index">




<div class="box box3">
	<div class="box_topo azul"> <span>Histórico de OS e chamados</span></div>

	<form action="" method="post">	
	<h2>Selecione : <select name="op" onchange="this.form.submit()">
		<option value="">Selecione</option>
		<option value="1">Chamados</option>
		<option value="2">Ordens de serviço</option>
		</select>
		</form>
</div>

<?php if (isset($_POST['op'])) {


switch ($_POST['op']) {
	case '1':
		
		include_once 'php/incCH.php';
		break;
		case '2':

		include_once 'php/incOS.php';
		
		break;
	default:
		?> 
		<script type="text/javascript">alert("Ocorreu algum erro, tente novamente mais tarde"); </script> 
		<meta http-equiv="refresh"> 
		<?php 
		break;
} 
}?>

</section>
<div class="foot azul"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>