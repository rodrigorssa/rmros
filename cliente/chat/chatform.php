<script type="text/javascript">
	$("#retorno").scrollTop($("#retorno")[0].scrollHeight);	

$( document ).ready ( function ()
{
	getContent(0);


});
		</script>  
<?php session_start(); include_once '../../class/Carrega.class.php';


if(isset($_POST['idadm'])){
	$id=$_POST['idadm'];
	$value="idadm";
	$nome=$_POST['nome'];
	$_SESSION['idadm']=$id;
	$_SESSION['idtec']=0;

}

if(isset($_POST['idtec'])){
	$id=$_POST['idtec'];
	$value="idtec";
	$nome=$_POST['nome'];
	$_SESSION['idtec']=$id;
	$_SESSION['idadm']=0;
	
}




?>
<div class="chat-header">

	<h2><?= $nome ?></h2>
	<input type="hidden" name="<?= $value ?>" value="<?= $id ?>">

<hr>
</div>
<div class="chat-box" id="retorno">



</div>
<hr>
<span>Escreva aqui sua mensagem:</span>


	<div class="form_index" style="position:relative">
	<input type="hidden" name="iduser" value="<?= $_SESSION['user'] ?>">
	<input type="hidden" name="idfrom" value= "<?= $_SESSION['user'] ?>" >
<textarea name="mensagem" required></textarea>
<input class="btn verde" type="submit" value="Enviar">
</div>
</form>

