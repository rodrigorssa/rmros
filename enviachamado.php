<?php 
require_once 'class/Carrega.class.php';

$id= isset($_POST['id']) ? $_POST['id'] : '';
$id_user= isset($_POST['id_user']) ? $_POST['id_user'] : '';
$id_tecnico= isset($_POST['id_tecnico']) ? $_POST['id_tecnico'] : '';
$data_horafim= isset($_POST['data_horafim']) ? $_POST['data_horafim'] : '';
$descricao= isset($_POST['descricao']) ? $_POST['descricao'] : '';
$status= isset($_POST['status']) ? $_POST['status'] : '';

if($_GET['acao']=="add"){

$obj= new chamados();

$obj->id_tecnico=($id_tecnico!='') ? $id_tecnico : null;
$obj->id_user=$id_user;
$obj->descricao=$descricao;


$obj->inserir();

}

if($_GET['acao']=="edit"){

$obj= new chamados();


$obj->id_tecnico=$id_tecnico;
$obj->data_horafim=$data_horafim;
$obj->descricao=$descricao;
$obj->status=$status;


$obj->atualizar($id);

}
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
    header("Location: enterprise/tec/inicio.php");
}
 ?>