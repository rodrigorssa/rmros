<?php
session_start();

set_time_limit(0);
include_once "../../../class/Carrega.class.php"; 
include_once '../../../class/rb.class.php';
include_once '../../../class/DB.class.php';

R::selectDatabase('rmros');



if(isset($_SESSION['idadm']) && $_SESSION['idadm']!= 0 ){
	$idadm=$_SESSION['idadm'];
	$idtec=$_SESSION['tec'];
	$lastId = (int) $_GET['timestamp'];
	$array=R::getAll("SELECT * FROM chattecadm WHERE idtec='$idtec' AND idadm='$idadm' AND id > $lastId ORDER by id");
}

if(isset($_SESSION['iduser']) && $_SESSION['iduser']!= 0 ){
	$iduser=$_SESSION['iduser'];
	$idtec=$_SESSION['tec'];
	$lastId = (int) $_GET['timestamp'];
	$array=R::getAll("SELECT * FROM chatusertec WHERE iduser='$iduser' AND idtec='$idtec' AND id > $lastId ORDER by id");
}

$data = '';

if($array!=array()){

	foreach ($array as $mensagem) {
		if($mensagem['idfrom']==$idtec){
			$data .= '<span class="chat-msg0 flr clb amarelo">' . htmlspecialchars($mensagem["mensagem"]) . '</span>';
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
