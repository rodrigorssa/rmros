<script type="text/javascript">
 $(document).ready(function(){
	        //form de selecionar equipamento
        $('#pequip').submit(function(e){
            e.preventDefault();
           var $form= $(this);
 			$('#newequip').fadeOut('fast');
           $.post(this.action,$form.serialize(),function(w){
           
            $('#newos').fadeIn('slow');
            $('#retorno3').html(w);
           });
        }); 
    }); 
</script>
<?php 
include_once '../../../class/rb.class.php';

include_once '../../../class/DB.class.php';

include_once '../../../class/Carrega.class.php';

R::selectDatabase('rmros');

$id=isset($_POST['id']) ? $_POST['id'] : "";

//validar cadastro cliente

$a= new compusers();
if ($a->retonly($id)==array()) { ?> 
<script>alert('Cadastro complementar não encontrado.')
location.reload();
</script>
<?php die(); } 


$dados=R::findAll("equipamentos","id_cliente= $id"); 

 if($dados==array()) die("<span>Nada encontrado.</span> <a href='equipamentos.php?idCl=<?= $id  ?>' class='btn amarelo btn-pdd' >NOVO EQUIPAMENTO</a>");?>

<span class="aviso">*Para melhor visualização, utilizar modo paisagem.</span>




<?php foreach ($dados as $valor) { ?>

<div class="listar">

<form action="php/pos.php" id="pequip" method="post">
			<input type="hidden" name="id_cliente" value="<?= $valor->id_cliente ?>">
			<input type="hidden" name="id" value="<?= $valor->id ?>">
			<input type="submit" class="bdamarelo" value="<?= $valor->id."   ".$valor->tipo." ".$valor->marca." N°: ".$valor->nserie?>" />
		
	</form>
</div>

<?php } ?>
	
</tbody>
</table>
