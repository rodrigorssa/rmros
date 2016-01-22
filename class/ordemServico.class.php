<?php 
date_default_timezone_set('UTC');
include_once 'rb.class.php';
include_once "DB.class.php";

R::selectDatabase('rmros');

Class ordemServico{

	private $id;
	private $id_cliente;
	private $id_equip;
	private $id_tecnico;
	private $descricao;
	private $defeito;
	private $data_horasaida;
	private $id_status;
	private $obs;
	private $enc_os;
	private $previsao_entrega;


public function __construct(){
	$enc_os=false;
}

public function __get($key) {
    return $this->$key;
}

public function __set($key, $value) {
    $this->$key =  $value;
}

public function inserir(){
	$data=R::dispense('os');

	$data->id_cliente=$this->id_cliente;
	$data->id_tecnico=$this->id_tecnico;
	$data->id_equip=$this->id_equip;
	$data->descricao=$this->descricao;
	$data->previsao_entrega=$this->previsao_entrega;
	$data->defeito=$this->defeito;
	$data->id_status=$this->id_status;
	$data->obs=$this->obs;
	$data->enc_os=$this->enc_os;

	R::store($data);
}

public function atualizar($id){
	$data=R::load('os',$id);

	$data->id_tecnico=$this->id_tecnico;
	$data->descricao=$this->descricao;
	$data->id_status=$this->id_status;
	$data->data_horasaida=date('Y-m-d H:m:i',strtotime($this->data_horasaida));
	$data->enc_os=$this->enc_os;


	R::store($data);
}


public function findNomes(){


$data=R::getAll("SELECT os.id, u.nome,u.sobrenome,s.descricao FROM os JOIN users u ON
					 os.id_cliente=u.id JOIN status s ON os.id_status=s.id ORDER BY os.id_status");

return $data;

}

public function findNomesTec($id="",$enc_os=""){


$data=R::getAll("SELECT os.id, u.nome,u.sobrenome,s.descricao FROM os JOIN users u ON
					 os.id_cliente=u.id JOIN status s ON os.id_status=s.id WHERE os.id_tecnico='$id' AND os.enc_os='$enc_os'");

return $data;

}
public function retonly($id=''){

	$data=R::findOne("os","id='$id'");

	return $data;
}

public function countOpenOs($id=""){

	$data=R::count("os","id_cliente='$id' and enc_os='false'");

	return $data;
}

public function countOpenOsTec($id=""){

	$data=R::count("os","id_tecnico='$id' and enc_os='false'");

	return $data;
}


public function getlistTable($id="",$enc_os=false){

	$data=R::getAll("SELECT e.marca,e.tipo,e.ram,e.hd,s.descricao,os.id_status,os.id FROM os JOIN equipamentos e ON 
							os.id_equip=e.id JOIN status s ON os.id_status=s.id WHERE os.id_cliente='$id' AND os.enc_os='".$enc_os."'");

	return $data;
}
public function getlistTableTec($id="",$enc_os=""){

	$data=R::getAll("SELECT e.marca,e.tipo,e.ram,e.hd,s.descricao,os.id_status,os.id FROM os JOIN equipamentos e ON 
							os.id_equip=e.id JOIN status s ON os.id_status=s.id WHERE os.id_tecnico='$id' AND os.enc_os='".$enc_os."'");

	return $data;
}

public function retCliente($id=""){

	$dados= R::getRow("SELECT nome,sobrenome,telefone,endereco,email FROM users u JOIN compusers c ON u.id=c.id WHERE u.id='$id'");

	return $dados;
}

public function retEquip($id=""){
	
	$dados=R::findOne("equipamentos", "id='$id'");

	return $dados;

}

public function retTecnico($id=""){

	$dados=R::getRow("SELECT nome,sobrenome FROM tecnicos WHERE id='$id'");

	return $dados;
}

public function retStatus($id=""){

	$dados=R::getCol("SELECT descricao FROM status WHERE id='$id'");

	return $dados;
}
}
 ?>