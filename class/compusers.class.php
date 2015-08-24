<?php
include_once 'rb.class.php';
include_once "DB.class.php";

R::selectDatabase('rmros');

class compusers {

    private $id;
    private $rg;
    private $cpf;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $telefone;

public function __get($key) {
    return $this->$key;
}

public function __set($key, $value) {
    $this->$key =  $value;
}



public function inserir(){

/*
$data=R::dispense('compusers');

$data->id=$this->id;
$data->rg=$this->rg;
$data->cpf=$this->cpf;
$data->endereco=$this->endereco;
$data->numero=$this->numero;
$data->complemento=$this->complemento;
$data->bairro=$this->bairro;
$data->telefone=$this->telefone;

$id=R::store($data); */ 

$id=R::exec("INSERT INTO compusers(id,rg,cpf,endereco,numero,complemento,bairro,telefone)
    VALUES ('$this->id','$this->rg','$this->cpf','$this->endereco','$this->numero','$this->complemento','$this->bairro','$this->telefone') returning id");


return $id;

}

public function retonly($id=""){

    $retorno=R::findOne("compusers","id='$id'");

    return $retorno;

}

public function atualizar($id){


$data=R::load("compusers",$id);

$data->rg=$this->rg;
$data->cpf=$this->cpf;
$data->endereco=$this->endereco;
$data->numero=$this->numero;
$data->complemento=$this->complemento;
$data->bairro=$this->bairro;
$data->telefone=$this->telefone;


R::store($data);



}


}