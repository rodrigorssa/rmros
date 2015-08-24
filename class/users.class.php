<?php
include_once 'rb.class.php';
include_once "DB.class.php";

R::selectDatabase('rmros');

class users {

    private $id;
    private $nome;
    private $sobrenome;
    private $login;
    private $senha;
    private $email;
    

public function __get($key) {
    return $this->$key;
}

public function __set($key, $value) {
    $this->$key =  $value;
}


public function login($user="",$senha=""){


    $SS=sha1($senha);

    $login=R::findOne("users","login='$user' AND senha='$SS'");

return $login;
}


public function inserir(){



$data=R::dispense('users');

$data->nome=$this->nome;
$data->sobrenome=$this->sobrenome;
$data->email=$this->email;
$data->senha=$this->senha;
$data->login=$this->login;


$id=R::store($data);

return $id;

}

public function retonly($id=""){

    $retorno=R::findOne("users","id='$id'");

    return $retorno;

}

public function atualizar($obj){

$data=R::load('users',$obj->id);

$data->nome=$obj->nome;
$data->sobrenome=$obj->sobrenome;
$data->email=$obj->email;
$data->senha=$obj->senha;
$data->login=$obj->login;


$id=R::store($data);

return $id;

}

public function getAll(){

$obj=R::findAll('users', 'order by nome asc');

return $obj;

}

public function findNomes(){

    $data=R::getAll("SELECT id,nome,sobrenome FROM users ORDER BY nome ASC");
    return $data;
}

}
