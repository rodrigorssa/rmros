<?php date_default_timezone_set('America/Sao_paulo'); ?>
<div class="box box3" id="listCH">
	<div class="box_topo verde"><span>Lista de chamados</span></div>

	<span class="clb">Selecione o status do chamado:</span>
	<div class="form_index" style="position:relative">
	<label for="aberto">Aberto</label> <input type="radio" name="chamado" id="aberto" value="aberto">
<label for="fechado">Fechado</label> <input type="radio" name="chamado" id="fechado" value="fechado">
	</div>	

	<?php 
	$tr=new chamados();

	$lista=$tr->getChCliente($id);
	if(empty($lista)) echo "<span>Nenhum chamado encontrado.</span>";
	?>

	<div class="hide" id="chaberto">
		<?php 
		foreach ($lista as $user) {
			?>

			<div class="listar">
				
				<?php if($user->status==false){ ?>
				<form action="php/verch.php"  method="post" class="formCH">
					<input type="hidden" name="id" value="<?= $user->id ?>"/>
					<input type="submit" class="bdverde"  value="<?= date('d/m/Y H:i:s', strtotime($user->data_horainicio)); ?>"/></form>
					<?php } ?>

				</div>


				<?php } ?> 

			</div> 
			<div class="hide" id="chfechado">
				<?php  foreach ($lista as $user) {?>

				<div class="listar">

					<?php if($user->status==true) { ?>
					<form action="php/verch.php"  method="post" class="formCH">
						<input type="hidden" name="id" value="<?= $user->id ?>"/>
						<input type="submit" class="bdverde"  value="<?= date('d/m/Y H:i:s', strtotime($user->data_horainicio)); ?>"/></form>

						<?php } ?>

						</div>
						<?php } ?>
				
			
		</div>
		</div>
<div class="box box3 hide" id="verCH">
<div id="retornoCH"></div>
		

</div>