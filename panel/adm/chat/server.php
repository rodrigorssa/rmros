<?php
session_start();

set_time_limit(0);
include_once "../../../class/Carrega.class.php"; 
include_once '../../../class/rb.class.php';
include_once '../../../class/DB.class.php';

R::selectDatabase('rmros');



if(isset($_SESSION['idtec']) && $_SESSION['idtec']!= 0 ){
	$idtec=$_SESSION['idtec'];
	$idadm=$_SESSION['adm'];
	$lastId = (int) $_GET['timestamp'];
	$array=R::getAll("SELECT * FROM chattecadm WHERE idtec='$idtec' AND idadm='$idadm' AND id > $lastId ORDER by id");
}

if(isset($_SESSION['iduser']) && $_SESSION['iduser']!= 0 ){
	$iduser=$_SESSION['iduser'];
	$idadm=$_SESSION['adm'];
	$lastId = (int) $_GET['timestamp'];
	$array=R::getAll("SELECT * FROM chatuseradm WHERE iduser='$iduser' AND idadm='$idadm' AND id > $lastId ORDER by id");
}

$data = '';

if($array!=array()){

	foreach ($array as $mensagem) {
		if($mensagem['idfrom']=="2"){
			$data .= '<span class="chat-msg0 flr clb azul">' . htmlspecialchars($mensagem["mensagem"]) . '</span>';
		}else{
			$data .= '<span class="chat-msg1 fll clb">' . htmlspecialchars($mensagem["mensagem"]) . '</span>';
		}
	}

	$lastId = end($array)['id'];
} else {
	$lastId = $_GET['timestamp'];
}


		$arrData = array(
			'content' => $data,
			'timestamp' => $lastId
		);		

		$json = json_encode( $arrData );

		echo $json;
