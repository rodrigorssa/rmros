<?php
//FORMULÁRIO DE CADASTRO DE CLIENTES 
function value(){

	include_once '../../class/Carrega.class.php';

	if(isset($_GET['id'])) $cod=$_GET['id']; else $cod="0";

	$obj= new users();

	$b=$obj->retonly($cod);

return $b;

	
}

function value2(){

	include_once '../../class/Carrega.class.php';

	if(isset($_GET['id'])) $cod=$_GET['id']; else $cod="0";

	$obj= new compusers();

	$b=$obj->retonly($cod);

return $b;

	
}

$retorno=value();
$comp=value2();
$a="";
if($comp!=array()) $a="?comp=2";

?>

<div class="box_topo azul"><span>Dados de <?= $retorno->nome ?></span></div>

<div class="aviso clb"><span> Equipamentos</span></div>

<a href="equipamentos.php?idCl=<?= $retorno->id;  ?>" class="btn azul btn-pdd" >NOVO</a><a href="equipamentos.php?list=<?= $retorno->id;  ?>" class="btn azul btn-pdd" >VER TODOS</a>
<form action="<?= 'php/cadcliente.php'.$a; ?>" class="form_index" style="position:relative" data-redirect="ver.php?id=<?= $retorno->id ?>" method='post'>

<div class="aviso clb"><span> Dados de login</span></div>
		
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" value="<?= $retorno->nome;  ?>" />
		
			<label for="sobrenome">Sobrenome:</label>
			<input type="text" name="sobrenome" id="sobrenome" value="<?= $retorno->sobrenome;  ?>"   />
		
		
			<label for="login">Login:</label>
			<input type="text" id="login" name="login" value="<?= $retorno->login;  ?>" />
		
		
			<label for="senha">Senha:</label>
			<input type="password" name="pass" id="senha" value=""   />
		
		
			<label for="email">E-mail:</label>
			<input type="email" id="email" name="email" value="<?= $retorno->email;  ?>" />
		
			<input type="hidden" name="id" value="<?= $retorno->id;  ?>" />


		<div class="aviso clb"><span> Dados complementares</span></div>

		
			<p><label for="cdrg">RG:</label></p>
			<input type="text" id="cdrg" name="rg" placeholder="RG." <?php if($comp!=array()){ echo 'value='.'"'.$comp->rg.'" readonly'; } ?> maxlength="10" />
		
		
			<p><label for="cdcpf">CPF:</label></p>
			<input type="text" id="cdcpf" name="cpf"  placeholder="CPF." <?php if($comp!=array()){ echo 'value='.'"'.$comp->cpf.'" readonly'; } ?> maxlength="11" />
		
		
			<label for="cduser">Endereço:</label>
			<input type="text" id="cduser" name="endereco" placeholder="Endereço." value="<?php if($comp!=array()) echo $comp->endereco; ?>" maxlength="100" />
		

		
			<label for="cdbairro">Bairro:</label>
			<input type="text" id="cdbairro" name="bairro" placeholder="Bairro."value="<?php if($comp!=array()) echo $comp->bairro; ?>"  />
		


		
			<label for="cdpass">Numero:</label>
			<input type="text" id="cdpass" name="numero" placeholder="Numero." value="<?php if($comp!=array()) echo $comp->numero; ?>"value="<?php if($comp!=array()) echo $comp->endereco; ?>" />
		


		
			<label for="cdtel">Telefone:</label>
			<input type="text" id="cdtel" name="telefone" placeholder="Telefone." value="<?php if($comp!=array()) echo $comp->telefone; ?>" />
		

		
			<label for="cdcomp">Complemento:</label>
			<input type="text" id="cdcomp" name="comp" placeholder="Complemento." value="<?php if($comp!=array()) echo $comp->complemento; ?>" maxlength="50"/>
		

		
			<input type="submit" id="btnlogin" class="btn btn_large  azul" value="Enviar" />
		
</form>



