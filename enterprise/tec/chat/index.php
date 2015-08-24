<!DOCTYPE HTML>
<html>
<?php include_once "../php/verificalogin.php"; include_once '../../../class/Carrega.class.php';?>
<head>
	<meta charset="utf-8">
	<title>RMR.OS - CHAT</title>
	<link rel="stylesheet" href="../../../css/estilos.css" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<script type="text/javascript" src="../../../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../../js/index_sem_ajax.js"></script>
	<script type="text/javascript" src="js/chat.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<header class="topo amarelo">
        <a href="../index.php"><img class="logo_rmr" src="../../../img/logo.png" alt="Logo_rmr.OS" /></a>
<span class="resptop menu-chat" ></span>
</header>
<div class="gambs"></div>

<form action="inserir.php" class="chatmessages" method="post">

<section class="chat box" id="chatbox">
<div class="chat-header">
<h2 >Selecione um usuário</h2>
<hr>
</div>
<div class="chat-box">

<div class="chat-bg"></div>
<!-- BALÕES DE CHAT ESQUERDA
<span class="chat-msg1 fll clb">Oi</span>
<span class="chat-msg1 fll clb">tudo bem?</span>

DIREITA
<span class="chat-msg0 flr clb">Oi</span>
<span class="chat-msg0 flr clb">Não cara :(</span>-->
</div>
<hr>
<span>Escreva aqui sua mensagem:</span>


	<div class="form_index" style="position:relative">
	<input type="hidden" name="idtec" value="<?= $_SESSION['tec'] ?>">
<textarea name="mensagem" disabled></textarea>
<input class="btn amarelo" disabled type="submit" value="Enviar">
</div>
</form>

</section>


<aside class="chat-list">
<div class="chat_title azul"><span>Administradores</span></div>

<div class="chat-users">
<?php $obj=new funcionarios("admins");
	
	 foreach ($obj->findNomes() as $admin) { ?>
	 <form method="post" class="selUser" action="chatform.php" >
	 	<input type="hidden" name="idadm" value="<?= $admin['id'] ?>">
		<input type="hidden" name="nome"  value="<?= $admin['nome'].' '.$admin['sobrenome'] ?>">
	 	<input type="submit"  value="<?= $admin['nome'].' '.$admin['sobrenome'] ?>">
	 	</form>

	<?php }  ?>

</div>

<div class="chat_title verde"><span>Clientes</span></div>
<div class="chat-users chat-userstec">

<?php $obj=new users();
	
	 foreach ($obj->findNomes() as $admin) { ?>
	 	 <form method="post" class="selUser" action="chatform.php" >
	 	<input type="hidden" name="iduser" value="<?= $admin['id'] ?>">
		<input type="hidden" name="nome"  value="<?= $admin['nome'].' '.$admin['sobrenome'] ?>">
	 	<input type="submit"  value="<?= $admin['nome'].' '.$admin['sobrenome'] ?>">
	 	</form>

	<?php }  ?></div>
</aside>
<div class="foot amarelo"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>