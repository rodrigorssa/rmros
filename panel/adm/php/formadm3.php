<?php
//FORMULÁRIO DE EDIÇÃO DE FUNCIONARIOS 


$table=$_POST['funcionarios'];

function value(){
	$table=$_POST['funcionarios'];
	include_once '../../class/Carrega.class.php';

	if(isset($_POST['id'])) $cod=$_POST['id']; else $cod="0";

	$obj= new funcionarios($table);

	$b=$obj->retonly($cod);

return $b;

	
}

function nome(){
	$table=$_POST['funcionarios'];
	if($table=="tecnicos") $b="técnico";
	elseif($table=="admins") $b="administrador";

		return $b;
}



$retorno=value();


function checked(){

	global $retorno;
	$data="checked";
	if($retorno!=array()){
		
		if ($retorno->ativo==false) {
			$data="";

			 return $data;
		}
		
	}
	return $data;
}

$a="?add";
if($retorno!=array()) $a="?edit"; //MUDAR COMANDO

?>

<div class="box_topo azul">
<span><?php if($retorno==array()) echo "Novo ".nome();
else echo "Dados de ".$retorno->nome;
 ?></span></div>
			<?php if(isset($_SESSION['adm']) && $retorno!=array() && $table=="tecnicos"){ ?>
			
			<div class="btn-pdd"><a class="btn listar azul" href="status.php?tec=<?= $retorno->id ?>">RELATÓRIOS GERAIS</a></div class="btn-pdd">
			
			<?php } ?>
<form action="<?= 'php/cadfunc.php'.$a; ?>" class="form_index" style="position:relative" data-redirect="funcionarios.php" method='post'>

		
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" value="<?php if($retorno!=array()) echo $retorno->nome; ?>" />
		
			<label for="sobrenome">Sobrenome:</label>
			<input type="text" name="sobrenome" id="sobrenome" value="<?php if($retorno!=array()) echo $retorno->sobrenome; ?>"   />
		
		
			<label for="login">Login:</label>
			<input type="text" id="login" name="login" value="<?php if($retorno!=array()) echo $retorno->login; ?>" />
		
		
			<label for="senha">Senha:</label>
			<input type="password" name="pass" id="senha" value=""   />
		
		
			<label for="email">E-mail:</label>
			<input type="email" id="email" name="email" value="<?php if($retorno!=array()) echo $retorno->email; ?>" />
			
			<input type="hidden" name="table" value="<?= $table  ?>" />
			
		<?php 

		//se for form de ediçao, ativa o campo hidden

		if($retorno!=array()) { ?>
			<input type="hidden" name="id" value="<?= $retorno->id;  ?>" />
		
		<?php } ?>

		<div class="aviso clb"><span> Dados complementares</span></div>

			<p><label for="cdativo">Atividade:</label></p>
			<?php $ativo=(checked()=="checked") ? "Ativo" : "Inativo"?>

			<input type="checkbox" name="ativo" <?php echo checked() ?> >
			<span class='warn'><?php echo $ativo ?></span>
		
			<p><label for="cdrg">RG:</label></p>
			<input type="text" id="cdrg" name="rg" placeholder="RG." <?php if($retorno!=array()){ echo 'value='.'"'.$retorno->rg.'" readonly'; } ?> maxlength="10" />
		
		
			<p><label for="cdcpf">CPF:</label></p>
			<input type="text" id="cdcpf" name="cpf" placeholder="CPF." <?php if($retorno!=array()){ echo 'value='.'"'.$retorno->cpf.'" readonly'; } ?> maxlength="11" />
		
		
			<label for="cduser">Endereço:</label>
			<input type="text" id="cduser" name="endereco" placeholder="Endereço." value="<?php if($retorno!=array()) echo $retorno->endereco; ?>" maxlength="100" />
		

		
			<label for="cdbairro">Bairro:</label>
			<input type="text" id="cdbairro" name="bairro" placeholder="Bairro."value="<?php if($retorno!=array()) echo $retorno->bairro; ?>"  />
		


		
			<label for="cdpass">Numero:</label>
			<input type="text" id="cdpass" name="numero" placeholder="Numero." value="<?php if($retorno!=array()) echo $retorno->numero; ?>"value="<?php if($retorno!=array()) echo $retorno->endereco; ?>" />
		


		
			<label for="cdtel">Telefone:</label>
			<input type="text" id="cdtel" name="telefone" placeholder="Telefone." value="<?php if($retorno!=array()) echo $retorno->telefone; ?>" />
		

		
			<label for="cdcomp">Complemento:</label>
			<input type="text" id="cdcomp" name="comp" placeholder="Complemento." value="<?php if($retorno!=array()) echo $retorno->complemento; ?>" maxlength="50"/>
		

		
			<input type="submit" id="btnlogin" class="btn btn_large  azul" value="Enviar" />
		
</form>



