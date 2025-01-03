<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

$front_of_site = $_FILES['front_of_site']['name'];
$gate = $_FILES['gate']['name'];
$external_sides1 = $_FILES['external_sides1']['name'];
$external_sides2 = $_FILES['external_sides2']['name'];
$external_sides3 = $_FILES['external_sides3']['name'];
$external_sides4 = $_FILES['external_sides4']['name'];
$right_side_internal = $_FILES['right_side_internal']['name'];
$internal_site_background = $_FILES['internal_site_background']['name'];
$left_side_internal = $_FILES['left_side_internal']['name'];
$internal_site_backgrounds = $_FILES['internal_site_backgrounds']['name'];
$extra1 = $_FILES['extra1']['name'];
$extra2 = $_FILES['extra2']['name'];
$type_of_closure = $_FILES['type_of_closure']['name'];
$wall_height = $_FILES['wall_height']['name'];


$diretorio = "admin/uploads/";
move_uploaded_file($_FILES['front_of_site']['tmp_name'], "../admin/uploads/" . $front_of_site);
move_uploaded_file($_FILES['gate']['tmp_name'], "../admin/uploads/" . $gate);
move_uploaded_file($_FILES['external_sides1']['tmp_name'], "../admin/uploads/" . $external_sides1);
move_uploaded_file($_FILES['external_sides2']['tmp_name'], "../admin/uploads/" . $external_sides2);
move_uploaded_file($_FILES['external_sides3']['tmp_name'], "../admin/uploads/" . $external_sides3);
move_uploaded_file($_FILES['external_sides4']['tmp_name'], "../admin/uploads/" . $external_sides4);
move_uploaded_file($_FILES['right_side_internal']['tmp_name'], "../admin/uploads/" . $right_side_internal);
move_uploaded_file($_FILES['internal_site_background']['tmp_name'], "../admin/uploads/" . $internal_site_background);
move_uploaded_file($_FILES['left_side_internal']['tmp_name'], "../admin/uploads/" . $left_side_internal);
move_uploaded_file($_FILES['internal_site_backgrounds']['tmp_name'], "../admin/uploads/" . $internal_site_backgrounds);
move_uploaded_file($_FILES['extra1']['tmp_name'], "../admin/uploads/" . $extra1);
move_uploaded_file($_FILES['extra2']['tmp_name'], "../admin/uploads/" . $extra2);
move_uploaded_file($_FILES['type_of_closure']['tmp_name'], "../admin/uploads/" . $type_of_closure);
move_uploaded_file($_FILES['wall_height']['tmp_name'], "../admin/uploads/" . $wall_height);



$cadastro_clientepf = "INSERT INTO facades_and_sides(front_of_site,
	gate,
	external_sides1, 
	external_sides2,
	external_sides3,
	external_sides4, 
	right_side_internal, 
	internal_site_background, 
	left_side_internal, 
	internal_site_backgrounds, 
	extra1, 
	extra2, 
	type_of_closure, 
	wall_height, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$front_of_site',
	'$gate',
	'$external_sides1', 
	'$external_sides2',
	'$external_sides3',
	'$external_sides4',
	'$right_side_internal',
	'$internal_site_background',
	'$left_side_internal',
	'$internal_site_backgrounds',
	'$extra1',
	'$extra2',
	'$type_of_closure',
	'$wall_height',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa cinco<br>
			do relatório, informaçoes do Energia, preencha abaixo!</div>";
	header('Location: ../energia.php?clientid=' . $client_id);
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
