<?php require_once "../../../class/Carrega.class.php";
	  require_once"../../../class/rb.class.php";
	  require_once"../../../class/DB.class.php";

R::selectDatabase('rmros');

include_once '../../../valida-cpf.php';


$id= isset($_POST['id']) ? $_POST['id'] : '';
$nome= isset($_POST['nome']) ? $_POST['nome'] : '';
$sobre= isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$user= isset($_POST['login']) ? $_POST['login'] : '';
$mail= isset($_POST['email']) ? $_POST['email'] : '';



$usr= R::load('users', $id);
	$usr->nome=$nome;
	$usr->sobrenome=$sobre;
	$usr->email=$mail;
	$usr->login=$user;

	//verifica se o campo senha está vazio, se estiver, não atualiza

	$pass= isset($_POST['pass']) ? $_POST['pass'] : '';
	if($pass!='')	$usr->senha=sha1($pass);



$rg= isset($_POST['rg']) ? $_POST['rg'] : '';


$cpf= isset($_POST['cpf']) ? $_POST['cpf'] : '';
$endereco= isset($_POST['endereco']) ? $_POST['endereco'] : '';
$numero= isset($_POST['numero']) ? $_POST['numero'] : '';
$complemento= isset($_POST['comp']) ? $_POST['comp'] : '';
$telefone= isset($_POST['telefone']) ? $_POST['telefone'] : '';
$bairro= isset($_POST['bairro']) ? $_POST['bairro'] : '';

if(isset($_GET['comp'])){ 
	$comp= R::load("compusers", $id);
}
else{
	$comp= new compUsers();
}


	$comp->id=$id;
	$comp->rg=$rg;
	
	//validar CPF
	if(validaCPF($cpf)) $comp->cpf=$cpf; else die("Digite um CPF válido.");

	$comp->endereco=$endereco;
	$comp->numero=$numero;
	$comp->complemento=$complemento;
	$comp->bairro=$bairro;
	$comp->telefone=$telefone;

	R::begin();
    try{

        R::store($usr);
        if(isset($_GET['comp'])) R::store($comp);
        else $comp->inserir();
        
        R::commit();
    }
    catch( Exception $e ) {
    	die("Ocorreu algum erro, tente novamente mais tarde.");
        R::rollback();
    }
     

	

 ?>