<?php date_default_timezone_set('America/Sao_paulo'); include_once '../../../class/Carrega.class.php'; ?>

<?php
if (!isset($_SESSION)) session_start();
 $idcliente=$_POST['id']; 

$a= new compusers();
if ($a->retonly($idcliente)==array()) { ?> 
<script>alert('Cadastro complementar não encontrado.')
location.reload();
</script>
<?php die(); } 

$obj=new users();

$user=$obj->retonly($idcliente);

?>

<div class="box_topo amarelo"><span>Novo chamado</span><div class="close">X</div></div>

			<form class="form" action="../../enviachamado.php?acao=add" data-redirect="inicio.php" method="post">

				<div class="form-h">
					<span>Nome do cliente: <?= $user->nome;  ?></span>
				</div>

				<div class="form-h">
					<span>Data da solicitação: <?php echo date('d/m/Y H:i:s'); ?></span>


				</div>
				<input type="hidden" name="id_user" value="<?= $user->id; ?>">
				<input type="hidden" name="id_tecnico" value="<?= $_SESSION['tec'] ?>">
				<div class="form_index" style="position:relative">

					<p class="clb"><label for="descricao">Descrição:</label></p>
					<textarea name="descricao" id="descricao" ></textarea>

					<input type="submit" class="btn amarelo" value="Enviar">
				</div>
			</form>