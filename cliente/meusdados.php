<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; ?>
<head>
    <title>RMR.OS - Meus dados</title>
    <link rel="stylesheet" href="../css/estilos.css" />
    <link rel="stylesheet" href="../css/normalize.css" />
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script>
    $(document).ready(function(){

 		$('#cdcpf').mask("999.999.999-99");
 		 $("#cdtel").mask("(99) 9999-9999");
 		 $('#cdrg').mask('9999999999');
});
    </script>
    <meta charset="utf-8">
</head>
<body>

<?php include "php/topo.php";

?><section class="index fll">
<div class="box-home">
<div class="box box2" style="width:260px">
<div class="box_topo verde"><span>Dados de login</span></div>

<?php $direct="meusdados.php"; $action="../cadastro.php"; include_once '../form-cad1.php'; ?>

<a id="cadastro" class="btn_3 verde box_centro">VER</a>

</div>
</div>
</section>

<section class="index fll">
<div class="box-home">
<div class="box box2" style="width:260px">
<div class="box_topo verde"><span>Dados complementares</span></div>

<?php $direct2="meusdados.php"; $action2="../cadastro.php?comp"; include_once '../form-cad2.php'; ?>

<a  id ="login" class="btn_3 verde box_centro">VER</a>

</div>
</div>
</section>


<div class="foot verde"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>