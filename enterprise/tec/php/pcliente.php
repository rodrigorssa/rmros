<?php 
if(isset($_POST['os'])){ 
  $action="php/pequip.php";  ?>

<script type="text/javascript">
$(document).ready(function(){
	        //form de selecionar equipamento
        $('#pequip').submit(function(e){
            e.preventDefault();
           var $form= $(this);
 			$('#newcliente').fadeOut('fast');
           $.post(this.action,$form.serialize(),function(w){
           
            $('#newequip').fadeIn('slow');
            $('#retorno2').html(w);
           });
        }); 
    });
</script>

<?php } ?>

<?php if(isset($_POST['ch'])) { 
  $action="php/pch.php"; ?>
<script type="text/javascript">
$(document).ready(function(){
          //form de criar chamado
        $('#pequip').submit(function(e){
            e.preventDefault();
           var $form= $(this);
      $('#newcliente').fadeOut('fast');
           $.post(this.action,$form.serialize(),function(w){
            $('#newCH').fadeIn('slow');
            $('#retorno2').html(w);
           });
        }); 
    });
</script>
 <?php }?>
<?php 
include '../../../class/rb.class.php';

include '../../../class/DB.class.php';

R::selectDatabase('rmros');

$nome=isset($_POST['nome']) ? $_POST['nome'] : "";


$dados=R::findAll("users"," LOWER (nome || sobrenome) LIKE LOWER('%".$nome."%') ORDER BY id"); ?>


<?php if($dados==array()) die("<span>Nada encontrado.</span>");?>

<hr>
<span class="warn">Clientes</span>



<?php foreach ($dados as $valor) { ?>

<div class="listar">
	<td ><form action="<?= $action ?>" id="pequip" method="post" >
			<input type="hidden" name="id" value="<?= $valor->id ?>">
			<input type="submit" class="bdamarelo" value="<?= $valor->nome.' '.$valor->sobrenome ?>" />
		
	</form></a></td>
	
</div>

<?php } ?>