<script type="text/javascript">
	$("#retorno").scrollTop($("#retorno")[0].scrollHeight);	

$( document ).ready ( function ()
{
	getContent(0);


});
		</script>  
<?php session_start(); include_once '../../../class/Carrega.class.php';


if(isset($_POST['idadm'])){
	$id=$_POST['idadm'];
	$value="idadm";
	$nome=$_POST['nome'];
	$_SESSION['idadm']=$id;
	$_SESSION['iduser']=0;

}

if(isset($_POST['iduser'])){
	$id=$_POST['iduser'];
	$value="iduser";
	$nome=$_POST['nome'];
	$_SESSION['iduser']=$id;
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
	<input type="hidden" name="idtec" value="<?= $_SESSION['tec'] ?>">
	<input type="hidden" name="idfrom" value= "1" >
<textarea name="mensagem" required></textarea>
<input class="btn amarelo" type="submit" value="Enviar">
</div>
</form>

