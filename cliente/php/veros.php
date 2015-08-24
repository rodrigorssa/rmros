<script type="text/javascript">
	function pdf() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#print')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 30,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        pdf.save('Test.pdf');
    }, margins);
}
	

	$(document).ready(function(){

		        $('#voltar').click(function(){
        	$('#veros').hide();
        	$('#listOS').fadeIn('slow');
        });
	});
</script>
<?php 
include_once '../../class/Carrega.class.php';

$id=isset($_POST['os']) ? $_POST['os'] : "";

$os= new ordemServico();

$dados=$os->retonly($id);

$cliente=$os->retCliente($dados->id_cliente);

$equip=$os->retEquip($dados->id_equip);

$tecnico=$os->retTecnico($dados->id_tecnico);

$status=$os->retStatus($dados->id_status);

 ?>
 <div id="print">
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
</div>
<button class="btn verde btn_large" onclick="pdf()">Imprimir OS</button>
<button class="btn verde btn_large" id="voltar">Voltar</button>