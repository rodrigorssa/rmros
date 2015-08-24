<?php 
require_once"../../../class/Carrega.class.php";

$obj=new equipamentos();

$obj->id=isset($_POST['id']) ? $_POST['id'] : "";
$obj->id_cliente=isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "";
$obj->tipo=isset($_POST['tipo']) ? $_POST['tipo'] : "";
$obj->marca=isset($_POST['marca']) ? $_POST['marca'] : "";
$obj->nserie=isset($_POST['nserie']) ? $_POST['nserie'] : "";
$obj->ram=isset($_POST['ram']) ? $_POST['ram'] : "";
$obj->processador=isset($_POST['processador']) ? $_POST['processador'] : "";
$obj->hd=isset($_POST['hd']) ? $_POST['hd'] : "";
$obj->video=isset($_POST['video']) ? $_POST['video'] : "";



if(isset($_GET['add'])){

$obj->inserir();
}


if(isset($_GET['edit'])){

	$id=$_GET['edit'];

	$obj->atualizar($id);
}

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
    header("Location: ../clientes.php");
}
 ?>