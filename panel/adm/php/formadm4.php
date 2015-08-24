<?php
//FORMULÁRIO DE CADASTRO DE EQUIPAMENTOS
function value(){

	include_once '../../class/Carrega.class.php';

	if(isset($_POST['id'])) $cod=$_POST['id']; else $cod="0";
	
	$obj= new equipamentos();

	$b=$obj->retonly($cod);


	return $b;

}


function user($a){

	$cod=isset($a->id_cliente) ? $a->id_cliente : "0";
	$obj= new users();
	$b=$obj->retonly($cod);
	return $b;

}

$retorno=value();


$a=($retorno==array()) ? "?add" : "?edit=".$retorno->id;



$user=user($retorno);

?>

<div class="box_topo azul">
	<span> <?php if(isset($_GET['idCl'])) echo "Novo"; ?> Equipamento <?php if($user!=array()) echo "de ".$user->nome; ?></span>
</div>

<form action="php/cadequip.php<?= $a ?>" class="form_index" style="position:relative" method='post'>

	<div class="clb" style="padding:10px">
		<label for="tipo">Tipo:</label>
		<select id="tipo" name="tipo" class="select">
			<option value="Computador" <?php if($retorno!=array()) {if($retorno->tipo=="Computador")  echo"selected"; } ?> >Computador</option>
			<option value="Notebook" <?php if($retorno!=array()) {if($retorno->tipo=="Notebook")  echo"selected"; } ?>>Notebook</option>

		</select>
	</div>
	<label for="marca">Marca:</label>
	<input type="text" name="marca" id="marca" value="<?php if($retorno!=array()) echo $retorno->marca;  ?>"   />

	<label for="nserie">Numero de Série:</label>
	<input type="text" name="nserie" id="nserie" value="<?php if($retorno!=array()) echo $retorno->nserie;  ?>"   />


	<label for="ram">Memória RAM:</label>
	<input type="text" id="ram" name="ram" value="<?php if($retorno!=array()) echo $retorno->ram;  ?>" />


	<label for="processador">Processador:</label>
	<input type="text" name="processador" id="processador" value="<?php if($retorno!=array()) echo $retorno->processador;  ?>" />


	<label for="hd">Hard Disk:</label>
	<input type="text" id="hd" name="hd" value="<?php if($retorno!=array()) echo $retorno->hd;  ?>" />

	<label for="video">Placa de vídeo:</label>
	<input type="text" id="video" name="video" value="<?php if($retorno!=array()) echo $retorno->video;  ?>" />

<input type="hidden" name="id_cliente" value="<?php if(isset($_GET['idCl'])) echo $_GET['idCl']; else echo $retorno->id_cliente; ?>" />
	
	<?php if($retorno!=array()) { ?>
	<input type="hidden" name="id" value="<?php if($retorno!=array()) echo $retorno->id;  ?>" />
	<?php } ?>	


	<input type="submit" id="btnlogin" class="btn btn_large  azul" value="Enviar" />

</form>



