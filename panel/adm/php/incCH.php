

<?php date_default_timezone_set('America/Sao_paulo'); ?>
<span class="aviso">*Para melhor visualização, utilizar modo paisagem do celular.</span>
<div class="box box3" id="listCH">
	<div class="box_topo azul"><span>Lista de chamados encerrados</span></div>
	<table class="display" cellspacing="0" width="100%">
		<thead>
			<th>Nome</th>
			<th>Status</th>
			<th>Data inicial</th>
		</thead>
		<tbody>
			<?php 
			$tr=new chamados();

			$lista=$tr->getChTecnico($id,"AND status=true");

			if(empty($lista)) echo "<span>Nenhum chamado encontrado.</span>";

			foreach ($lista as $user) {
				$nome=$tr->getNomeCliente($user['id_user']);
				?><tr>
				<td><?=  htmlspecialchars($nome['nome'].' '.$nome['sobrenome'])?></td>
				<td>
					<?php if($user->status==false) echo"<span>Aberto</span>"; else echo "<span>Fechado</span>"; ?></td>
					<td><div class="listar">
						<form action="php/verch.php"  method="post" class="formCH">
							<input type="hidden" name="id" value="<?= $user->id ?>"/>

							<input type="submit" class="bdazul "  value="<?= date('d/m/Y', strtotime($user->data_horainicio)); ?>"/></form>
						</div>


					</td></tr>
					<?php } ?>
				</tbody>
			</table>
	</div>
<div class="box box3 hide" id="verCH">
<div id="retornoCH"></div>
</div>