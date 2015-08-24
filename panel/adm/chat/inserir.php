<?php include_once '../../../class/Carrega.class.php';

$iduser=isset($_POST['iduser'])? $_POST['iduser'] : "";
$idtec=isset($_POST['idtec'])? $_POST['idtec'] : "";
$idadm=isset($_POST['idadm'])? $_POST['idadm'] : "";
$mensagem=isset($_POST['mensagem'])? $_POST['mensagem'] : "";
$idfrom=isset($_POST['idfrom'])? $_POST['idfrom'] : "";


/*
if($iduser!="" && $idtec!=""){

	$obj=new chat();
	$obj->iduser=$iduser;
	$obj->idtec=$idtec;
	$obj->idfrom=$idfrom;
	$obj->mensagem=$mensagem;
	$obj->UserTec();
}*/
if($iduser!="" && $idadm!=""){


	$obj=new chat();
	$obj->iduser=$iduser;
	$obj->idadm=$idadm;
	$obj->idfrom=$idfrom;
	$obj->mensagem=$mensagem;
	$obj->AdmUser();
}

if($idtec!="" && $idadm!=""){
	$obj=new chat();
	$obj->idtec=$idtec;
	$obj->idadm=$idadm;
	$obj->mensagem=$mensagem;
	$obj->idfrom=$idfrom;
	$obj->TecAdm();
} 
 ?>