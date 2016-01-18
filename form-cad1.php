<script type="text/javascript">


var user=function(){
	var valor=$('#cduser').val();

	$.post("ver-login.php",{opcao:'login',login: valor},function(e){
		if(e){

			alert(e);
			$('#cduser').focus();
			return;
		}
	});
};

var email=function(){
	var valor=$('#cdemail').val();

	$.post("ver-login.php",{opcao:'email',email: valor},function(e){
		if(e){	

			alert(e);
			$('#cdemail').focus();
			return;}
			;

	});
};



$(document).ready(function(){
var usuario=document.getElementById('cduser');
var mail=document.getElementById('cdemail');
 usuario.onchange= user;
 	mail.onchange= email;
});
</script>
<?php 

function value(){

	include_once 'class/Carrega.class.php';

	if(isset($_SESSION['user'])) $cod=$_SESSION['user']; else $cod="0";

	$obj= new users();

	$b=$obj->retonly($cod);

return $b;

	
}
$a="";
$retorno=value();

if($retorno!=array()) $a="?atualizar=1";

 ?>

<form action="<?= $action.$a ?>" method="post" id="cdform" class="form_index hide" id="formcad" data-redirect="<?= $direct ?>">
		
		<label for="cdnome">Nome:</label>
		<input type="text" id="cdnome"name="nome" placeholder="Nome." value="<?php if($retorno!=array()) echo $retorno->nome; ?>" maxlength="50" required/>
		
		<label for="cdsobre">Sobrenome:</label>
		<input type="text" id="cdsobre" name="sobre" placeholder="Sobrenome." value="<?php if($retorno!=array()) echo $retorno->sobrenome; ?>" maxlength="100" required/>

		<label for="cdemail">E-mail:</label>
		<input type="email" id="cdemail" name="mail" placeholder="E-mail." value="<?php if($retorno!=array()) echo $retorno->email; ?>" required/>

		<label for="cduser">Usuario:</label>
		<input type="text" id="cduser" name="user"  placeholder="Nome de usuário." value="<?php if($retorno!=array()) echo $retorno->login; ?>" maxlength="50" required/>

		<label for="cdpass">Senha:</label>
		<input type="password" id="cdpass" name="pass" placeholder="No mínimo 6 dígitos." minlength= "6" maxlength="20"  required/>


		<?php if($retorno!=array()) { ?> <input type="hidden" name="id" value="<?= $retorno->id; ?>" /> <?php } ?>

		<input type="submit" class="btn verde" value="Enviar" />



	</form>