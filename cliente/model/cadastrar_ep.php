<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de energia 1
$operator = $_POST['operator'];
$base_size = $_POST['base_size'];
$operator_identification = $_FILES['operator_identification']['name'];
$equipment_base = $_FILES['equipment_base']['name'];
$equipment = $_FILES['equipment']['name'];
$rru_on_the_groundequipment = $_FILES['rru_on_the_ground']['name'];
// medidores de energia 1
$operator2 = $_POST['operator2'];
$base_size2 = $_POST['base_size2'];
$operator_identification2 = $_FILES['operator_identification2']['name'];
$equipment_base2 = $_FILES['equipment_base2']['name'];
$equipment2 = $_FILES['equipment2']['name'];
$rru_on_the_groundequipment2 = $_FILES['rru_on_the_ground2']['name'];



$diretorio = "admin/uploads/";
//campos de mover imagem do medidor 1
move_uploaded_file($_FILES['operator']['tmp_name'], "../admin/uploads/" . $operator);
move_uploaded_file($_FILES['base_size']['tmp_name'], "../admin/uploads/" . $base_size);
//campos de mover imagem do medidor 2
move_uploaded_file($_FILES['operator_identification']['tmp_name'], "../admin/uploads/" . $operator_identification);
move_uploaded_file($_FILES['equipment_base']['tmp_name'], "../admin/uploads/" . $equipment_base);
//campos de mover imagem do medidor 3
move_uploaded_file($_FILES['equipment']['tmp_name'], "../admin/uploads/" . $equipment);
move_uploaded_file($_FILES['rru_on_the_ground']['tmp_name'], "../admin/uploads/" . $rru_on_the_ground);

move_uploaded_file($_FILES['operator2']['tmp_name'], "../admin/uploads/" . $operator2);
move_uploaded_file($_FILES['base_size2']['tmp_name'], "../admin/uploads/" . $base_size2);
//campos de mover imagem do medidor 2
move_uploaded_file($_FILES['operator_identification2']['tmp_name'], "../admin/uploads/" . $operator_identification2);
move_uploaded_file($_FILES['equipment_base2']['tmp_name'], "../admin/uploads/" . $equipment_base2);
//campos de mover imagem do medidor 3
move_uploaded_file($_FILES['equipment2']['tmp_name'], "../admin/uploads/" . $equipment2);
move_uploaded_file($_FILES['rru_on_the_ground2']['tmp_name'], "../admin/uploads/" . $rru_on_the_ground2);


$cadastro_clientepf = "INSERT INTO operator_equipment(operator,
  base_size,
  operator_identification,
  equipment_base,
   equipment,
   rru_on_the_ground,
   operator2,
   base_size2,
   operator_identification2,
   equipment_base2,
   equipment2,
   rru_on_the_ground2,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$operator',
	'$base_size',
	'$operator_identification',
	'$equipment_base',
	'$equipment',
	'$rru_on_the_ground',
	'$operator2',
	'$base_size2',
	'$operator_identification2',
	'$equipment_base2',
	'$equipment2',
	'$rru_on_the_ground2',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa sete<br>
			do relatório, informaçoes das observações, preencha abaixo!</div>";
	header('Location: ../observacoes.php?clientid=' . $client_id);
} else {
	/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	*/

	$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

	//header('Location: ../lista_clientes.php?erro');

	echo mysqli_error($connect);
}
