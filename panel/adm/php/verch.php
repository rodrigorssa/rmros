<?php date_default_timezone_set('America/Sao_paulo');
include_once '../../../class/Carrega.class.php'; 

$id=$_POST['id'];

$dados= new chamados();

$obj=$dados->retonly($id);

$dados2=new users();

$users= $dados2->retonly($obj->id_user);

if($obj->id_tecnico!=null){
$dados3=new funcionarios("tecnicos");

$tec=$dados3->retonly($obj->id_tecnico);
}
?>

	<div class="box_topo azul"><span> Chamado n° <?= $obj->id ?> de <?= $users->nome ?></span></div>
		
		<p><span>Data/hora inicial:</span>
		<span><?= date('d/m/y H:m:i',strtotime($obj->data_horainicio));  ?></span></p>
		

		
		<span >Data/hora encerramento:</span>
		<span><?=date('d/m/y H:m:i',strtotime($obj->data_horafim)); ?></span></p>

		
		<p><span>Técnico:</span>
		<span><?php if($obj->id_tecnico!=null){ echo htmlspecialchars($tec->nome)." ". htmlspecialchars($tec->sobrenome);} ?></span></p>

		<div class="aviso clb"><span>Status e descrição</span></div>
		
		<p><span for="status">Status:</span>
		<?php 
		if($obj->status==false){ ?>
		<span>Aberto</span>

		<?php } else{  ?>

		<span>Fechado</span>
		<?php }?></p>



	</select>
<div class="form_index" style="position:relative">
	<p><span >Descrição:</span></p>
	<textarea disabled><?= htmlspecialchars($obj->descricao); ?></textarea >
		<p></p>
</div>