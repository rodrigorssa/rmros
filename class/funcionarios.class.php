<?php
include_once 'rb.class.php';
include_once "DB.class.php";

R::selectDatabase('rmros');

class funcionarios extends users {

    private $table;
    private $rg;
    private $cpf;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $telefone;
    private $ativo;

public function __construct($tabela){

$this->table=$tabela;
$this->ativo=true;
}

public function __get($key) {
    return $this->$key;
}

public function __set($key, $value) {
    $this->$key =  $value;
}


public function login($user="",$senha=""){


    $SS=sha1($senha);

    $login=R::findOne("$this->table","login='$user' AND senha='$SS'");

return $login;
}


public function inserir(){



$data=R::dispense($this->table);

$data->nome=$this->nome;
$data->sobrenome=$this->sobrenome;
$data->email=$this->email;
$data->senha=sha1($this->senha);
$data->login=$this->login;
$data->rg=$this->rg;
$data->cpf=$this->cpf;
$data->endereco=$this->endereco;
$data->numero=$this->numero;
$data->complemento=$this->complemento;
$data->bairro=$this->bairro;
$data->telefone=$this->telefone;
$data->ativo=$this->ativo;
$id=R::store($data);

return $id;

}

public function retonly($id=""){

    $retorno=R::findOne("$this->table","id='$id'");

    return $retorno;

}

public function atualizar($id){

$data=R::load("$this->table","$id");

$data->nome=$this->nome;
$data->sobrenome=$this->sobrenome;
$data->email=$this->email;
$data->login=$this->login;
$data->endereco=$this->endereco;
$data->numero=$this->numero;
$data->complemento=$this->complemento;
$data->bairro=$this->bairro;
$data->telefone=$this->telefone;
$data->ativo=$this->ativo;


//não atualiza se a senha for vazia
if($this->senha!='') $data->senha=sha1($this->senha);


$id=R::store($data);

return $id;

}

public function getAll(){

$obj=R::findAll('$this->table', 'order by nome asc');

return $obj;

}

public function findNomes(){

    $data=R::getAll("SELECT id,nome,sobrenome,ativo FROM $this->table ORDER BY id ASC");
    return $data;
}


}
