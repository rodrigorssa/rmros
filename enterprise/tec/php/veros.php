<script type="text/javascript">
	function pdf() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#veros')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    pdf.text("Assinatura do cliente",220,500);
    pdf.text("_________________________________",155,530);

    pdf.text("Assinatura do responsável",200,620);
    pdf.text("_________________________________",155,650);
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
        left: 80,
        width: 600
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
        pdf.save('OS.pdf');
    }, margins);
}
	

	$(document).ready(function(){

		        $('#voltar').click(function(){
        	$('#veros').hide();
        	$('#listOS').fadeIn('slow');
        });
	});
</script>
<style type="text/css">
td{
    padding: 5px;
}
</style>
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
 <table>
    <thead>
        <tr>
            <td>
                                                                    <h1>RMR.OS</h1>
            </td>
        </tr>
    </thead>
   <tbody>
    <tr style="border-bottom:1px solid #000">
    <td =>
                                                    <p><span>Rua exemplo teste teste n° 131</span></p>
        
    
   
    
                                                                                            <p><span>Fragata - Pelotas - RS</span></p>
        
    
   
    
                                                                                                <p><span>Ordem de serviço N° <?= $dados->id ?> </span></p>
        
    </td>
</tr>
</tr>


<tr align="left"><td><span>Nome: <?= htmlspecialchars($cliente['nome']." ".$cliente['sobrenome']) ?></span></td></tr>
<tr align="left"><td>

<span>Endereço: <?= htmlspecialchars($cliente['endereco']) ?></span></td></tr>

<tr align="left"><td>
<span>Email: <?= htmlspecialchars($cliente['email']) ?></span></td></tr>

<tr align="left" style="border-bottom:1px solid #000"><td>
<span>Telefone: <?= htmlspecialchars($cliente['telefone']) ?></span></td></tr>

<tr align="left"><td>
<span>Equipamento: <?= htmlspecialchars($equip->tipo." ".$equip->marca." ".$equip->ram." ". $equip->hd) ?></span>
</td></tr>

<tr align="left"><td>
<span>Numero de série: <?= htmlspecialchars($equip->nserie) ?></span>
</td></tr> 

<tr align="left"><td>
<span>Defeito informado:<?= htmlspecialchars($dados->defeito) ?></span></td>

</tr>
<tr align="left" style="border-bottom:1px solid #000">
<td>
<span>Observações: <?= htmlspecialchars($dados->obs) ?></span></td>

</tr>
<tr align="left">
<td>
<span>Status: <?= $status['0'] ?></span>
</td>

</tr>
<tr align="left">
<td><span>Técnico responsável: <?= $tecnico['nome']." ".$tecnico['sobrenome'] ?></span></td>

</tr>
<tr align="left" style="border-bottom:1px solid #000">
<td>
<span>Defeito Encontrado: <?= htmlspecialchars($dados->descricao) ?></span>
</td>
</tr>
</tbody>
</table>

<button class="btn amarelo btn_large" onclick="pdf()">Imprimir OS</button>
<button class="btn amarelo btn_large" id="voltar">Voltar</button>