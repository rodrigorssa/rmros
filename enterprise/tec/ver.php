<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; ?>
<head>
    <title>RMR.OS - VER</title>
    <link rel="stylesheet" href="../../css/estilos.css" />
    <link rel="stylesheet" href="../../css/normalize.css" />
    <script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>
    <script src="../../js/jquery.maskedinput.min.js"></script>
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

?>
<section class="index">
<div class="box box3">
<?php if(isset($_POST['chamados'])){
    include_once 'php/formadm2.php';
}elseif(isset($_POST['funcionarios'])){
    
    include_once 'php/formadm3.php';
}elseif(isset($_GET['id'])){
include_once 'php/formadm1.php';}
elseif(isset($_POST['os'])){
    $action="php/cados.php?edit"; $redirect="os.php";
    include_once 'php/formadm5.php';
} ?>


</section>


<div class="foot amarelo"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>