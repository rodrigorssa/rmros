<!DOCTYPE HTML>
<html>
<?php  include_once "php/verificalogin.php"; include_once '../../class/Carrega.class.php'; ?>
<head>
    <title>RMR.OS - ORDEM DE SERVIÇO</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/estilos.css" />
    <link rel="stylesheet" href="../../css/normalize.css" />
    <link rel="stylesheet" href="../../css/dataTables.responsive.css">
    <link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.min.css">
    <script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../../js/index_sem_ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script>
    $(document).ready(function(){

        $('#dataprev').mask("99/99/9999");

        //form para selecionar usuario
        $('.form').submit(function(e){
            e.preventDefault();
           var $form= $(this);

           $.post(this.action,$form.serialize(),function(w){

            $('#retorno').html(w);
           });
        });


        //botões de NOVO e de LISTAR

        $('#novaos').click(function(){
           
            $('#newcliente').fadeToggle('slow');

        });

        $('#listaros').click(function(){
           
            $('#listosbox').fadeToggle('slow');
            
        });

                $('.hide').submit(function(){
           
            $('#retorno').show();
            
        });
$('table').DataTable({responsive:true});
        
});


    </script>
    
</head>
<body>

<?php include "php/topo.php";

?>
<section class="index">
<div class="box box4">
    <div class="box_topo azul"><span>AÇÕES:</span></div>
<a class='btn azul btn-submenu' id="novaos">NOVA OS</a> <a id="listaros" class='btn azul btn-submenu'>LISTAR</a>
</div>

 <div class="box box4 hide" id="newcliente" >
<div class="box_topo azul"><span>Selecione o cliente:</span><div class="close">X</div></div>
<form action="php/pcliente.php" method="post" class="form">

    <label for="name">Nome do cliente:</label>
    <input type="text" name="nome" id="name"  required/>

    <input type="submit" class="btn azul btn-submenu" style="top:0" value="Pesquisar" />

</form>

<div id="retorno" class="hide"><img src="../../img/loading.gif" alt="Loading" /></div>


</div>

<div class="box box3 hide" id="newequip">
<div class="box_topo azul"><span>Selecione o equipamento:</span><div class="close">X</div></div>
<div id="retorno2" > <img src="../../img/loading.gif" alt="Loading" /></div>
</div>

<div class="box box3 hide" id="newos">
<div class="box_topo azul"><span>Criar OS:</span><div class="close">X</div></div>
<span class="aviso">*Para melhor visualização, utilizar modo paisagem.</span>
<div id="retorno3"><img src="../../img/loading.gif" alt="Loading" /></div>
</div>


    <div class="box box3 hide" id="listosbox">
    <div class="box_topo azul"><span>Lista de OS</span> <div class="close">X</div></div>
    <span class="aviso">*Para melhor visualização, utilizar modo paisagem.</span>
    <table class="display" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome cliente</th>
                <th>Status</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $tr=new ordemServico();

        $lista=$tr->findNomes();
      
        foreach ($lista as $os) {
         ?>
                <tr>
                <td><?= htmlspecialchars($os['id']); ?></td>
                <td><?= htmlspecialchars($os['nome'])." ".htmlspecialchars($os['sobrenome']); ?></td>
                <td><?= htmlspecialchars($os['descricao']); ?></td>
                <td><form action="ver.php"  method="post">
                    <input type="hidden" name="os" value="<?= $os['id'] ?>"/>
                <input type="submit"  value="ABRIR"/></form></td>
                
                
            </tr>
        
<?php } ?>
        </tbody>
    </table>
</div>
</section>
<div class="foot azul"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>