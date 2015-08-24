<?php include_once 'class/Carrega.class.php'; 

$a= new compusers();

if ($a->retonly($id)==array()) { ?>

<script type="text/javascript"> alert('Cadastro incompleto.');</script>

<?php header("Location:inicio.php"); } ?>