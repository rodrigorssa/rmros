<?php 
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION['user'])){
	?>
	<meta charset="utf-8">
	<script type="text/javascript">alert("Você não está logado!");
	location="../index.php";
	</script>
<?php
die();
} 
?>