<?php //FORM DE VER A OS ?>
<script type="text/javascript">
$(document).ready(function(){

$('#enc_os').click(function(event){
	var a=confirm('Tem certeza que deseja encerrar a OS? Esta operação não pode ser desfeita.');
	if(a==false){
		return false;
	};

	$('#encerrar').html('<input type="hidden" name="enc_os" value="" />');
})
});

</script>

<?php 
date_default_timezone_set('America/Sao_paulo');
function tec(){

$obj=new funcionarios("tecnicos");

return $obj->findNomes();
}

function dadosOs($id=""){

$obj= new ordemServico();

return $obj->retonly($id);

}

function dadosCliente($id=""){

	$array=R::getRow("SELECT u.id,nome,sobrenome,endereco FROM users u JOIN compusers c ON u.id=c.id ");

	return $array;
}

function dadosEquip($id=""){

	$array=R::getRow("SELECT id,tipo,marca,nserie FROM equipamentos WHERE id='$id'");

	return $array;
}

function dadosStatus($id=""){

	$array=R::findAll("status");

	return $array;
}

$os=dadosOs($_POST['os']);

$cliente=dadosCliente($os->id_cliente);

$equip=dadosEquip($os->id_equip);

$status=dadosStatus($os->status);

if($os->enc_os==true){ ?> <script type="text/javascript"> 
		alert("Esta OS está encerrada, você não pode mais fazer alterações nela.");
							</script>  <?php } ?>

<div class="box_topo amarelo"><span>Ordem de serviço n° <?= $os->id ?></span></div>
<form id="pos" action="<?= $action ?>" class="form_index" style="position:relative" data-redirect="<?= $redirect ?>">
	
			<div class="aviso clb"> <span>Cliente:</span></div>

			<p><span>Nome completo: <?= htmlspecialchars($cliente['nome'].' '.$cliente['sobrenome'])  ?></span></p>
			<p><span> Endereço: <?= htmlspecialchars($cliente['endereco'])?></span></p>
			
			<input type="hidden" name="id" value="<?= $os->id ?>" />
			<div id="encerrar"></div>
			<div class="aviso clb"> <span>Equipamento:</span></div>
			<p><span>Tipo: <?= htmlspecialchars($equip['tipo']) ?></span></p>
			<p><span> Marca: <?= htmlspecialchars($equip['marca']) ?></span></p>
			<p><span>N° de série: <?= htmlspecialchars($equip['nserie']) ?></span></p>
			<input type="hidden"  name="id_equip" value="<?= $equip['id'] ?>">

			<div class="aviso clb"> <span>Descrição da OS:</span></div>

			<label for="dataini">Data/hora inicial:</label>
			<input type="text" id="datini" name="dataini" value="<?= date('d/m/y H:m:i',strtotime($os->data_horaentrada));  ?>" readonly/>
		
		
		<label for="tec">Técnico:</label>


		<?php

		//SE A OS ESTIVER ENCERRADA, NÃO SERÁ PERMITIDO ALTERAR OS DADOS

		 if($os->enc_os==true){
			$lista=tec();
			foreach ($lista as $tec) { 
				if($os->id_tecnico==$tec['id'])	echo "<span>".$tec['nome']."</span>";
		}
			echo "<p></p> ";
			echo "<label for='status'>Status:</label>";
			$lista=dadosStatus();
			foreach ($lista as $status) { 
				if($os->id_status==$status->id) echo "<span>".$status->descricao."</span>";

		 } 
		 	} //END IF OS 
		 else { ?>
		<select class="select" name="id_tecnico" id="tec">
			<?php $lista=tec();
			foreach ($lista as $tec) { 
				if($os->id_tecnico==$tec['id']){ ?>
				<option value="<?= $tec['id'] ?>" selected><?= $tec['nome'] ?></option>

				<?php } }?>
			</select>

			<label for="status">Status:</label>
		<select class="select" name="id_status" id="status">

			<option value="0">Selecione..</option>
			<?php $lista=dadosStatus();
			foreach ($lista as $status) { 
				if($os->id_status==$status->id){ ?>
				<option value="<?= $status->id ?>" selected><?= $status->descricao ?></option>

				<?php } else {?>
				<option value="<?= $status->id ?>"><?= $status->descricao ?></option>
				<?php  } } ?>
			</select>

		<?php } //END ELSE ?>
					
				

					<p><span>Defeito:</span></p>
				<div class="fakeinput"><span ><?= htmlspecialchars($os->defeito)  ?></span></div>
				
				<p><span>Observações:</span></p>
				<div class="fakeinput"><span><?= $obs=($os->obs!="") ? htmlspecialchars($os->obs) : "Nenhuma observação."  ?></span></div <div class="fakeinput">



				<p><label for="descricao">Laudo técnico:</label>

					<?php if($os->enc_os!=true) { ?> 
					<input type="button"  onclick="update()" value="Inserir data atualização"></p>
					<textarea name="descricao" > <?= htmlspecialchars($os->descricao)  ?></textarea>
					<?php } else {  $desc= empty($os->descricao);?>
					</p><div class="fakeinput"><?php if($desc=="") echo" <span>Nenhum laudo encontrado. </span>";
					else 
						echo htmlspecialchars($os->descricao);  
					?></div>
					<p></p>
					<?php } ?>

			<?php if($os->enc_os!=true){ ?>
			<input type="submit"  class="btn btn_large amarelo" value="Enviar" />
			<input type="submit"  class="btn btn_large amarelo" id="enc_os" name="enc_os" value="Salvar e encerrar OS" />

		<?php  } ?>
</form>