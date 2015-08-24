<?php 
include 'rb.class.php';
include 'DB.class.php';


R::selectDatabase('rmros');


class chat{

private $id;
private $iduser;
private $idtec;
private $idadm;
private $mensagem;
private $idfrom;

public function __get($key) {
    return $this->$key;
}

public function __set($key, $value) {
    $this->$key =  $value;
}


public function UserTec(){
	$data=R::dispense("chatusertec");

	$data->iduser=$this->iduser;
	$data->idtec=$this->idtec;
	$data->mensagem=$this->mensagem;
	$data->idfrom=$this->idfrom;

	$id=R::store($data);

	return $id;
}

public function findUserTec(){
	$data=R::find("chatusertec", "iduser=".$this->iduser." AND idtec=".$this->idtec." order by id");

	return $data;
}

public function AdmUser(){
	$data=R::dispense("chatuseradm");

	$data->iduser=$this->iduser;
	$data->idadm=$this->idadm;
	$data->mensagem=$this->mensagem;
	$data->idfrom=$this->idfrom;

	$id=R::store($data);

	return $id;
}

public function findUserAdm(){
	$data=R::find("chatuseradm", "iduser=".$this->iduser." AND idadm=".$this->idadm." order by id");

	return $data;
}



public function TecAdm(){
	$data=R::dispense("chattecadm");

	$data->idtec=$this->idtec;
	$data->idadm=$this->idadm;
	$data->mensagem=$this->mensagem;
	$data->idfrom=$this->idfrom;

	$id=R::store($data);

	return $id;
}

public function findTecAdm(){
	$data=R::find("chattecadm", "idtec=$this->idtec AND idadm=$this->idadm order by id");

	return $data;
}


}