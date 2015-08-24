<!DOCTYPE HTML>
<html>
<head>
    <title>RMR.OS - Contato</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/normalize.css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="topo verde">
        <a href="index.php"><img class="logo_rmr" src="img/logo.png" alt="Logo_rmr.OS" /></a>
        <span id="menu" class="resptop"></span>
        <ul class="lista_top" id="lista-topo">
            <li class="verde"><a href="empresa.html">A EMPRESA</a></li>
            <li class="verde"><a href="contato.php">CONTATO</a></li>
        </ul>
</header>
<div class="gambs"></div>

<section class="index">
<div class="box box3">

<div class="box_topo verde"><span>Contato</span></div>
<h2> Em breve, retornaremos seu contato!</h2>
<form class="form_index" style="position:relative" action="mail.php" data-redirect="index.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome." required>
        
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Digite seu E-mail." required>
    

    <p class="clb"><label for="descricao">Mensagem:</label></p>
    <textarea name="mensagem" id="descricao" placeholder="Digite sua mensagem." required></textarea>
    
  <input type="submit" name="enviar" id="submit"  class="btn verde" value="Enviar"> 
    </div>
</form>

</div>
</section>
<div class="foot verde"> <p class="p_foot">RMR.OS - Todos os direitos reservados.</p></div>
</body>
</html>