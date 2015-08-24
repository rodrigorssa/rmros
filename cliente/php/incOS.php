<div class="box box2" id="listOS">
	<div class="box_topo verde"><span> Histórico de ordens de serviço</span></div>

	<?php if($obj->countOpenOS($id)=="0") { ?>

	<span>Você não possui ordens de serviço.</span>

	<?php }
	else {$lista=$obj->getlistTable($id,"true");?>


	<div class="clb btn-pdd">

	<div class="circulo verde bdverde"></div><span class="b">OS concluída.</span> 
	
		<div class="circulo vermelho bdvermelho"></div><span class="b">OS condenada/cancelada.</span>

	
		</div>

	<span class="aviso">*Para melhor visualização, utilizar modo paisagem do celular.</span>

	<?php foreach ($lista as $equip) { 

		switch ($equip['id_status']) {
			case '4':
				$classe="btn-ok";
				break;

				case '6':
				$classe="btn-cancel";
				break;

				case '5':
				$classe="btn-cancel";
				break;

			default:
				$classe="";
				break;
		}
		?>

		<div class="listar">

			<form action="php/veros.php" method="post" class="formos" >
				<input type="hidden" name="os" value="<?= $equip['id'] ?>" />
				<input type="submit" class="bdverde <?= $classe ?>" value="<?= $equip['tipo']." ".$equip['marca']." ".$equip['ram']." ".$equip['hd']  ?>" />

			</form>
		</div>

		<?php }  ?>

		<?php } //fim if ?>
	</div>

<div class="box box3 hide" id="veros">
<div id="retorno"></div>

</div>