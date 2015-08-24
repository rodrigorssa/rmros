<?php date_default_timezone_set('America/Sao_paulo'); ?>
<!DOCTYPE HTML>
<html>
<?php include_once "php/verificalogin.php"; ?>
<head>
    <title>RMR.OS - Chamados</title>
    <link rel="stylesheet" href="../css/estilos.css" />
    <link rel="stylesheet" href="../css/normalize.css" />
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include "php/topo.php"; 

$valor="";

$a= new compusers();
if ($a->retonly($id)==array()) { ?> 
<script>alert('Favor completar seu cadastro através do menu "MEUS DADOS".')
</script>

<?php $valor="disabled"; } ?>

<section class="index">
<div class="box">

<div class="box_topo verde"><span>Algum problema? Conte-nos!</span></div>

<form class="form" action="../enviachamado.php?acao=add" data-redirect="index.php" method="post">

        <div class="form-h">
            <span>Nome do cliente: <?= $user->nome;  ?></span>
        </div>

        <div class="form-h">
            <span>Data da solicitação: <?php echo date('d/m/Y H:i:s'); ?></span>
            
       
    </div>
    <input type="hidden" name="id_user" value="<?= $user->id; ?>">

    <div class="form_index" style="position:relative">

    <p class="clb"><label for="descricao">Descrição:</label></p>
    <textarea name="descricao" id="descricao" <?= $valor ?> required></textarea>
    
   <?php if ($a->retonly($id)!=array()) {?> <input type="submit" class="btn verde" value="Enviar"> <?php } ?>
    </div>
</form>

</div>
</section>
<div class="foot verde"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>