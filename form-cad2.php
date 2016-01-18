<?php 

function value2(){

	include_once 'class/Carrega.class.php';

	if(isset($_SESSION['user'])) $cod=$_SESSION['user']; else $cod="0";

	$obj= new compusers();

	$b=$obj->retonly($cod);

	return $b;

	
}
$a="";
$retorno=value2();

if($retorno!=array()) $a="=2";

 ?>

<form action="<?= $action2.$a ?>" method="post" style="top:27%" id="cdform" class="form_index hide" id="formcad" data-redirect="<?= $direct2 ?>" >
		
		<label for="cdrg">RG:</label>
		<input type="text" id="cdrg" name="rg" placeholder="RG." <?php if($retorno!=array()){ echo 'value='.'"'.$retorno->rg.'" readonly'; } ?> maxlength="10" />
		
		<label for="cdcpf">CPF:</label>
		<input type="text" id="cdcpf" name="cpf" placeholder="CPF." <?php if($retorno!=array()){ echo 'value='.'"'.$retorno->cpf.'" readonly'; } ?> maxlength="11" />

		<label for="cduser">Endereço:</label>
		<input type="text" id="cduser" name="endereco" placeholder="Endereço." value="<?php if($retorno!=array()) echo $retorno->endereco; ?>" maxlength="200" required/>

		<label for="cdpass">Numero:</label>
		<input type="text" id="cdpass" name="numero" maxlength="10" placeholder="Numero." value="<?php if($retorno!=array()) echo $retorno->numero; ?>"value="<?php if($retorno!=array()) echo $retorno->endereco; ?>" required/>

		<label for="cdbairro">Bairro:</label>
		<input type="text" id="cdbairro" name="bairro" maxlength="50" placeholder="Bairro."value="<?php if($retorno!=array()) echo $retorno->bairro; ?>"  required/>

		<label for="cdemail">Complemento:</label>
		<input type="text" id="cdemail" name="comp" placeholder="Complemento." value="<?php if($retorno!=array()) echo $retorno->complemento; ?>" maxlength="50"/>
		
		<label for="cdtel">Telefone:</label>
		<input type="text" id="cdtel" name="telefone" placeholder="Telefone." value="<?php if($retorno!=array()) echo $retorno->telefone; ?>" />

		<input type="hidden" name="id" value="<?= $_SESSION['user']; ?>" />

		<input type="submit" class="btn verde" value="Enviar" />

	</form>