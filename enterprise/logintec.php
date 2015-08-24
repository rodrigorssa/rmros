<?php
require_once '../class/Carrega.class.php';

if(!isset($_SESSION)) session_start();

if (!isset($_POST['user']) || ($login = $_POST['user']) === '') die('Usuário inválido.');
if (!isset($_POST['pass']) || ($senha = $_POST['pass']) === '') die('Senha inválida.');

$obj = new funcionarios("tecnicos");

$retorno=$obj->login($_POST['user'],$_POST['pass']);

if($retorno==null) die('Falha no login.');
if($retorno->ativo == false) die('Falha no login.');

$_SESSION['tec']=$retorno['id'];


if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
    header("Location: adm/inicio.php");
}