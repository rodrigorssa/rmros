<?php
include_once 'rb.class.php';
include_once "DB.class.php";

R::selectDatabase('rmros');



class chamados{

	private $id_user;
	private $data_horafim;
	private $descricao;
	private $id_tecnico;
	private $status;

public function __construct(){

	$this->status=false;
}

public function __get($key) {
    return $this->$key;
}

public function __set($key, $value) {
    $this->$key =  $value;
}


public function inserir(){

	$data=R::dispense('chamados');

	$data->id_user=$this->id_user;
	$data->descricao=$this->descricao;
	$data->status=$this->status;
	$data->id_tecnico=$this->id_tecnico;

	R::store($data);
}

public function atualizar($id){

	$data=R::load('chamados',$id);

	$tec= ($this->id_tecnico==0)? null : $this->id_tecnico;

	$data->id_tecnico=$tec;
	$data->descricao=$this->descricao;
	$data->status=$this->status;
	$data->data_horafim=$this->data_horafim;

	R::store($data);
}


public function getAll($acao=""){

	$data=R::findAll('chamados', $acao);

	return $data;
}

public function getChCliente($id=""){

	$data=R::find('chamados', "id_user='$id'");

	return $data;
}

public function getChTecnico($id="",$acao=""){

	$data=R::find('chamados', "id_tecnico='$id'".$acao);

	return $data;
}

public function retonly($id=""){
	$data=R::findOne('chamados',"id='$id'");

	return $data;
}

public function countOpenChTec($id=""){

	$data=R::count("chamados","id_tecnico='$id' and status='false'");

	return $data;
}

public function getNomeCliente($id=""){
	$data=R::getRow("SELECT nome,sobrenome FROM users WHERE id='".$id."'");

	return $data;
}
}