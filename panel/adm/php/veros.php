<script type="text/javascript">
	$(document).ready(function(){

		        $('#voltar').click(function(){
        	$('#veros').hide();
        	$('#listOS').fadeIn('slow');
        });
	});
</script>
<?php 
include_once '../../../class/Carrega.class.php';

$id=isset($_POST['os']) ? $_POST['os'] : "";

$os= new ordemServico();

$dados=$os->retonly($id);

$cliente=$os->retCliente($dados->id_cliente);

$equip=$os->retEquip($dados->id_equip);

$tecnico=$os->retTecnico($dados->id_tecnico);

$status=$os->retStatus($dados->id_status);

 ?>
<div class="cabeçalho">
 <p><h1>RMR.OS</h1></p>
 <p><span>Rua exemplo teste teste n° 131</span></p>
 <p><span>Fragata - Pelotas - RS</span></p>
<p><span>Ordem de serviço N° <?= $dados->id ?> </span></p>
</div>


<div class="dcliente">
<p><span>Nome: <?= htmlspecialchars($cliente['nome']." ".$cliente['sobrenome']) ?></span></p>
<p><span>Endereço: <?= htmlspecialchars($cliente['endereco']) ?></span></p>
<p><span>Email: <?= htmlspecialchars($cliente['email']) ?></span></p>
<p><span>Telefone: <?= htmlspecialchars($cliente['telefone']) ?></span></p>
</div>

<div class="dcliente">
<p><span>Equipamento: <?= htmlspecialchars($equip->tipo." ".$equip->marca." ".$equip->ram." ". $equip->hd) ?></span></p>
<p><span>Numero de série: <?= htmlspecialchars($equip->nserie) ?></span></p>
<p><span>Defeito informado:<?= htmlspecialchars($dados->defeito) ?></span></p>
<p><span>Observações: <?= htmlspecialchars($dados->obs) ?></span></p>
<p><span>Status: <?= $status['0'] ?></span></p>
</div>

<div class="dcliente">
<p><span>Técnico responsável: <?= $tecnico['nome']." ".$tecnico['sobrenome'] ?></span></p>

<p><span>Defeito Encontrado: <?= htmlspecialchars($dados->descricao) ?></span></p>
</div>

<button class="btn azul btn_large" onclick="print()">Imprimir OS</button>
<button class="btn azul btn_large" id="voltar">Voltar</button>