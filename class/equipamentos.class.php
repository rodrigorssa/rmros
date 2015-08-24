<?php
include_once 'rb.class.php';
include_once "DB.class.php";

R::selectDatabase('rmros');

class equipamentos {

    private $id;
    private $id_cliente;
    private $tipo;
    private $nserie;
    private $ram;
    private $processador;
    private $hd;
    private $video;
    private $marca;

public function __get($key) {
    return $this->$key;
}

public function __set($key, $value) {
    $this->$key =  $value;
}



public function inserir(){



$data=R::dispense('equipamentos');

$data->id_cliente=$this->id_cliente;
$data->tipo=$this->tipo;
$data->nserie=$this->nserie;
$data->ram=$this->ram;
$data->processador=$this->processador;
$data->hd=$this->hd;
$data->video=$this->video;
$data->marca=$this->marca;


$id=R::store($data);

return $id;

}

public function retonly($id=""){

    $retorno=R::findOne("equipamentos","id='$id'");

    return $retorno;

}

public function atualizar($id=""){

$data=R::load('equipamentos',$id);

$data->id_cliente=$this->id_cliente;
$data->tipo=$this->tipo;
$data->nserie=$this->nserie;
$data->ram=$this->ram;
$data->processador=$this->processador;
$data->hd=$this->hd;
$data->video=$this->video;
$data->marca=$this->marca;


$id=R::store($data);

return $id;

}

public function getAll(){

$obj=R::findAll('equipamentos', 'order by id asc');

return $obj;

}

public function meusequips($id=""){

$obj=R::findAll('equipamentos', 'id_cliente='."$id".' order by id asc');

return $obj;

}


}
