<?php //FORM DE EDIÇÃO DE CHAMADOS
date_default_timezone_set('America/Sao_paulo');
include_once '../../class/Carrega.class.php';
function value(){


	if(isset($_POST['chamados'])) $cod=$_POST['chamados']; else $cod="0";

	$obj= new chamados();

	$b=$obj->retonly($cod);

	return $b;

	
}

function value2(){


	if(isset($_POST['id'])) $cod=$_POST['id']; else $cod="0";

	$obj= new users();

	$b=$obj->retonly($cod);

	return $b;

	
}

function tec(){

	$obj=new funcionarios("tecnicos");

	return $obj->findNomes();
}

$retorno=value();
$comp=value2();

if($comp!=array()) $a="?acao=edit";

?>
<div class="box_topo azul"><span> Chamado n° <?= $retorno->id ?> de <?= $comp->nome ?></span></div>

<form action="<?= '../../enviachamado.php'.$a; ?>" class="form_index" style="position:relative" data-redirect="chamados.php">
	
	
	<label for="nome">Nome completo:</label>
	<input type="text" id="nome" name="nome" value="<?= $comp->nome.' '.$comp->sobrenome;  ?>" readonly/>

	<input type="hidden"  name="id" value="<?= $retorno->id ?>">
	
	<label for="dataini">Data/hora inicial:</label>
	<input type="text" id="dataini" name="dataini" value="<?= date('d/m/y H:m:i',strtotime($retorno->data_horainicio));  ?>" readonly/>
	

	
	<label for="datfinal">Data/hora encerramento:</label>
	<input type="text" name="data_horafim" id="datfinal" value="<?php if($retorno->data_horafim=="") echo date('d-m-Y H:m:s'); else echo date('d-m-y H:m:i',strtotime($retorno->data_horafim)) ?>"  />


	
	<label for="tec">Técnico:</label>
	<select class="select" name="id_tecnico" id="tec">
		<option value="0">Selecione..</option>
		<?php $lista=tec();

			foreach ($lista as $user) { 

				if($retorno->id_tecnico==$user['id']){ ?>
				<option value="<?= $user['id'] ?>" selected><?= $user['nome'] ?></option>

				<?php } else{ ?>
				<option value="<?= $user['id'] ?>"> <?= $user['nome'] ?></option>

				 <?php } }?>
			</select>
		<div class="aviso clb"><span>Status e descrição</span></div>
		
		<label for="status">Status:</label>
		<select class="select" name="status">

			<?php 
			if($retorno->status==false){ ?>
			<option value="0" selected>Aberto</option>
			<option value="1" >Fechado</option> 
			<?php } else{  ?>
			<option value="0" >Aberto</option>
			<option value="1" selected>Fechado</option>
			<?php }?>
			
			
			
		</select>
		
		<p><label for="descricao">Descrição:   </label><input type="button"  onclick="update()" value="Inserir data atualização"></p>
		<textarea name="descricao" ><?= $retorno->descricao ?></textarea>
		
		<input type="submit"  class="btn btn_large  azul" value="Enviar" />
		
	</form>