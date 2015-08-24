

<?php date_default_timezone_set('America/Sao_paulo'); ?>
<div class="box box3" id="listCH">
	<div class="box_topo verde"><span>Lista de chamados</span></div>
	
		<?php 
		$tr=new chamados();

		$lista=$tr->getChCliente($id);
		if(empty($lista)) echo "<span>Nenhum chamado encontrado.</span>";

		foreach ($lista as $user) {
		 ?>
			<div class="listar">
				
				<?php if($user->status==false) echo"<span>Aberto</span>"; else echo "<span>Fechado</span>"; ?>
				<form action="php/verch.php"  method="post" class="formCH">
					<input type="hidden" name="id" value="<?= $user->id ?>"/>
<input type="submit" class="bdverde"  value="<?= date('d/m/Y H:i:s', strtotime($user->data_horainicio)); ?>"/></form>
				
				
			</div>
			<?php } ?>
		</div>
<div class="box box3 hide" id="verCH">
<div id="retornoCH"></div>
		

</div>