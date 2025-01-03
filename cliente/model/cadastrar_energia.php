<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

$operators = $_POST['operators'];
$definitive_power_input = $_FILES['definitive_power_input']['name'];
$power_pole1 = $_FILES['power_pole1']['name'];
$post_in_good_condition = $_FILES['post_in_good_condition']['name'];
$power_pole2 = $_FILES['power_pole2']['name'];


$diretorio = "admin/uploads/";
move_uploaded_file($_FILES['definitive_power_input']['tmp_name'], "../admin/uploads/" . $definitive_power_input);
move_uploaded_file($_FILES['power_pole1']['tmp_name'], "../admin/uploads/" . $power_pole1);
move_uploaded_file($_FILES['post_in_good_condition']['tmp_name'], "../admin/uploads/" . $post_in_good_condition);
move_uploaded_file($_FILES['power_pole2']['tmp_name'], "../admin/uploads/" . $power_pole2);


$cadastro_clientepf = "INSERT INTO energy(operators,
	definitive_power_input,
	power_pole1, 
	post_in_good_condition,
	power_pole2, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$operators',
	'$definitive_power_input',
	'$power_pole1', 
	'$post_in_good_condition',
	'$power_pole2',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa seis<br>
			do relatório, informaçoes do Medidores de energia, preencha abaixo!</div>";
	header('Location: ../medidoresdeenergia.php?clientid=' . $client_id);
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
