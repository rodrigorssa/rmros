<?php require_once "../../../class/Carrega.class.php";



$table=isset($_POST['table']) ? $_POST['table'] : '';
$id= isset($_POST['id']) ? $_POST['id'] : '';

include_once '../../../valida-cpf.php';

$obj=new funcionarios($table);

$obj->nome=$nome= isset($_POST['nome']) ? $_POST['nome'] : '';
$obj->sobrenome=$sobre= isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$obj->login=$user= isset($_POST['login']) ? $_POST['login'] : '';
$obj->email=$mail= isset($_POST['email']) ? $_POST['email'] : '';
$obj->rg=$rg= isset($_POST['rg']) ? $_POST['rg'] : '';
$obj->senha=$pass= isset($_POST['pass']) ? $_POST['pass'] : '';

include_once 'validadm.php';


$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : '';
if (validaCPF($cpf)) {
	$obj->cpf=$cpf;
}else{
	die("Digite um CPF válido.");
}



$obj->endereco=$endereco= isset($_POST['endereco']) ? $_POST['endereco'] : '';
$obj->numero=$numero= isset($_POST['numero']) ? $_POST['numero'] : '';
$obj->complemento=$complemento= isset($_POST['comp']) ? $_POST['comp'] : '';
$obj->telefone=$telefone= isset($_POST['telefone']) ? $_POST['telefone'] : '';
$obj->bairro=$bairro= isset($_POST['bairro']) ? $_POST['bairro'] : '';

$obj->ativo=$ativo= isset($_POST['ativo']) ? true : false;


if(isset($_GET['add'])){

$obj->inserir();
}

if(isset($_GET['edit'])){

$obj->atualizar($id);
}




