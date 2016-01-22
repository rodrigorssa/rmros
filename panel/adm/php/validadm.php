<?php 

include_once '../../../class/Carrega.class.php';
include_once '../../../class/DB.class.php';
include_once '../../../class/rb.class.php';

R::selectDatabase("rmros");

//email
$v_email=R::getCol("SELECT email FROM $table where email= '$mail'");
if($v_email!=array()){ die("Selecione outro email.");}

//login
$v_login=R::getCol("SELECT login FROM $table where login= '$user'");
if($v_login!=array()){ die("Selecione outro usuário."); }


//senha
if(strlen($pass)<6) die("Insira uma senha com mais de 6 dígitos.");

 ?>