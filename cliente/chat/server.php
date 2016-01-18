<?php
session_start();

set_time_limit(0);
include_once "../../class/Carrega.class.php"; 
include_once '../../class/rb.class.php';
include_once '../../class/DB.class.php';

R::selectDatabase('rmros');



if(isset($_SESSION['idadm']) && $_SESSION['idadm']!= 0 ){
	$idadm=$_SESSION['idadm'];
	$iduser=$_SESSION['user'];
	$lastId = (int) $_GET['timestamp'];
	$array=R::getAll("SELECT * FROM chatuseradm WHERE iduser='$iduser' AND idadm='$idadm' AND id > $lastId ORDER by id");
}

if(isset($_SESSION['idtec']) && $_SESSION['idtec']!= 0 ){
	$idtec=$_SESSION['idtec'];
	$iduser=$_SESSION['user'];
	$lastId = (int) $_GET['timestamp'];
	$array=R::getAll("SELECT * FROM chatusertec WHERE iduser='$iduser' AND idtec='$idtec' AND id > $lastId ORDER by id");
}

$data = '';

if($array!=array()){

	foreach ($array as $mensagem) {
		if($mensagem['idfrom']=="0"){
			$data .= '<span class="chat-msg0 flr clb verde">' . htmlspecialchars($mensagem["mensagem"] ) .'</span><p class="chat-data flr clb">'. $mensagem["data"].'<p>';
		}else{
			$data .= '<span class="chat-msg1 fll clb">' . htmlspecialchars($mensagem["mensagem"]) . '</span><p class="chat-data fll clb">'. $mensagem["data"].'<p>';
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
