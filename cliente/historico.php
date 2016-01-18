<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; include_once '../class/Carrega.class.php'; include_once '../class/rb.class.php';?>
<head>
	<title>RMR.OS - Histórico</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/estilos.css" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../js/index_sem_ajax.js"></script>
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

//SELECIONAR CHAMADOS ABERTOS E FECHADOS

$('input:radio').on("change",function(){
	if($(this).val()=="aberto"){	
		$('#chaberto').fadeIn();
		$('#chfechado').fadeOut();
	}
		if($(this).val()=="fechado"){	
		$('#chfechado').fadeIn();
		$('#chaberto').fadeOut();
		
	}

});



    }); 

	</script>
</head>
<body>

<?php include "php/topo.php";

$obj=new ordemServico();



 ?>

<section class="index">




<div class="box box3">
	<div class="box_topo verde"> <span>Histórico de OS e chamados</span></div>

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
		# code...
		break;
} 
}?>

</section>
<div class="foot verde"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>