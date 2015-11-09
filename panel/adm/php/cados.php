<?php date_default_timezone_set('America/Sao_paulo');
require_once"../../../class/Carrega.class.php";

$obj=new ordemServico();


$obj->id_cliente=isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "";
$obj->id_tecnico=isset($_POST['id_tecnico']) ? $_POST['id_tecnico'] : "";
$obj->id_equip=isset($_POST['id_equip']) ? $_POST['id_equip'] : "";
$obj->id_status=isset($_POST['id_status']) ? $_POST['id_status'] : "";
$obj->descricao=isset($_POST['descricao']) ? $_POST['descricao'] : "";
$obj->defeito=isset($_POST['defeito']) ? $_POST['defeito'] : "";
$obj->previsao_entrega=isset($_POST['dataprev']) ? $_POST['dataprev'] : "";
$obj->obs=isset($_POST['obs']) ? $_POST['obs'] : "";
$obj->data_horasaida=isset($_POST['enc_os']) ? date('d/m/Y H:m:s') : null;
$obj->enc_os=isset($_POST['enc_os']) ? true : false;



if(isset($_GET['add'])){

$obj->inserir();
}


if(isset($_GET['edit'])){

	$id=$_POST['id'];

	$obj->atualizar($id);
}
 ?>