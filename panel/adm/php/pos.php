<script type="text/javascript">
$(document).ready(function(){
	        //form de selecionar equipamento
	        $('#pos').submit(function(e){
	        	e.preventDefault();
	        	var $form= $(this);
	        	$('#newos').fadeOut('fast');
	        	$.post(this.action,$form.serialize(),function(w){
	        		if(w){
	        			alert("Erro ao cadastrar OS, tente novamente.");
	        			return;
	        		}
	        		alert("OS cadastrada com sucesso!");
	        		Location=$form.attr('data-redirect');
	        	}).error('Ocorreu algum erro, tente mais tarde');
	        }); 
	    }); 
</script>
<?php 
date_default_timezone_set('America/Sao_paulo');
include_once '../../../class/rb.class.php';

include_once '../../../class/DB.class.php';

include_once '../../../class/Carrega.class.php';

R::selectDatabase('rmros');


function tec(){

	$obj=new funcionarios("tecnicos");



	return $obj->findNomes();
}

function status(){

	$obj=R::findAll("status");

	return $obj;
}



$id=isset($_POST['id']) ? $_POST['id'] : "";
$id_cliente=isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "";

$list=R::getAll("SELECT * FROM equipamentos e JOIN users u ON e.id_cliente=u.id JOIN compusers c ON c.id=u.id  AND u.id=$id_cliente AND e.id=$id"); 
foreach ($list as $dados) {
	
	?>

	<form id="pos" action="php/cados.php?add" class="form_index" style="position:relative" data-redirect="">
		
		<div class="aviso clb"> <span>Cliente:</span></div>

		<p><span>Nome completo: <?= $dados['nome'].' '.$dados['sobrenome'];  ?></span></p>
		<p><span> Endereço: <?= $dados['endereco'] ?></span></p>

		<input type="hidden"  name="id_cliente" value="<?= $dados['id_cliente'] ?>">
		

		<div class="aviso clb"> <span>Equipamento:</span></div>
		<p><span>Tipo: <?= $dados['tipo'] ?></span></p>
		<p><span> Marca: <?= $dados['marca'] ?></span></p>
		<p><span>N° de série: <?= $dados['nserie'] ?></span></p>
		<input type="hidden"  name="id_equip" value="<?= $id ?>">

		<div class="aviso clb"> <span>Descrição da OS:</span></div>

		<label for="dataini">Data/hora inicial:</label>
		<input type="text" id="datini" name="dataini" value="<?= date('d/m/y H:m:i');  ?>" readonly/>
		
		
		<label for="tec">Técnico:</label>
		<select class="select" name="id_tecnico" id="tec">

			<option value="0">Selecione..</option>
			<?php $lista=tec();
			
			foreach ($lista as $tec) { 
				if($dados['id_tecnico']==$tec['id']){ ?>
				<option value="<?= $tec['id'] ?>" selected><?= $tec['nome'] ?></option>

				<?php } ?>
				<option value="<?= $tec['id'] ?>"><?= $tec['nome'] ?></option>
				<?php  } ?>
			</select>
			
			<label for="status">Status:</label>
			<select class="select" name="id_status" id="status">

				<option value="0">Selecione..</option>
				<?php $lista=status();
				foreach ($lista as $status) { ?>
				<option value="<?= $status->id ?>"><?= $status->descricao ?></option>
				<?php  } ?>
			</select>
			

			<p><label for="defeito">Defeito:</label></p>
			<textarea name="defeito" ></textarea>
			
			<p><label for="obs">Observações:</label></p>
			<textarea name="obs" ></textarea>
			<input type="submit"  class="btn btn_large  azul" value="Enviar" />


			
		</form>

		<?php } ?>