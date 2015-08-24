<?php include_once '../../class/Carrega.class.php';

$iduser=isset($_POST['iduser'])? $_POST['iduser'] : "";
$idtec=isset($_POST['idtec'])? $_POST['idtec'] : "";
$idadm=isset($_POST['idadm'])? $_POST['idadm'] : "";
$mensagem=isset($_POST['mensagem'])? $_POST['mensagem'] : "";
$idfrom=isset($_POST['idfrom'])? $_POST['idfrom'] : "";



if($iduser!="" && $idtec!=""){

	$obj=new chat();
	$obj->iduser=$iduser;
	$obj->idtec=$idtec;
	$obj->idfrom=$idfrom;
	$obj->mensagem=$mensagem;
	$obj->UserTec();
}
elseif($iduser!="" && $idadm!=""){


	$obj=new chat();
	$obj->iduser=$iduser;
	$obj->idadm=$idadm;
	$obj->idfrom=$idfrom;
	$obj->mensagem=$mensagem;
	$obj->AdmUser();
}
/*
  CHAT DE USERS - descomentar nas outras pags
if($idTec!="" && $idAdm!=""){
	$obj->idTec=$idTec;
	$obj->idAdm=$idAdm;
	$obj->mensagem=$mensagem;
	$obj->TecAdm();
} */
 ?>