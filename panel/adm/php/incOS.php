<div class="box box2" id="listOS">
	<div class="box_topo azul"><span> Histórico de ordens de serviço</span></div>

	<?php if($obj->countOpenOSTec($id)=="0") { ?>

	<span>Você não possui ordens de serviço.</span>

	<?php }
	else {$lista=$obj->getlistTableTec($id,"true");?>

	<span class="aviso">*Para melhor visualização, utilizar modo paisagem do celular.</span>

	<?php foreach ($lista as $equip) {?>

		<div class="listar">

			<form action="php/veros.php" method="post" class="formos" >
				<input type="hidden" name="os" value="<?= $equip['id'] ?>" />
				<input type="submit" class="bdazul <?= $classe ?>" value="<?= $equip['tipo']." ".$equip['marca']." ".$equip['ram']." ".$equip['hd']  ?>" />

			</form>
		</div>

		<?php }  ?>

		<?php } //fim if ?>
	</div>

<div class="box box3 hide" id="veros">
<div id="retorno"></div>

</div>