<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de aterramento 1
$base_a = $_FILES['base_a']['name'];
// medidores de aterramento 2
$base_b = $_FILES['base_b']['name'];
// medidores de aterramento 3
$base_c = $_FILES['base_c']['name'];
// medidores de aterramento 4
$base_d = $_FILES['base_d']['name'];
// medidores de aterramento 4
$gate_grounding= $_FILES['gate_grounding']['name'];
// medidores de aterramento 4
$lighting_pole_grounding= $_FILES['lighting_pole_grounding']['name'];
// medidores de aterramento 4
$grounding1 = $_FILES['grounding1']['name'];
// medidores de aterramento 4
$grounding2 = $_FILES['grounding2']['name'];


$diretorio = "admin/uploads/";
//campos de mover imagem do aterramento 1
move_uploaded_file($_FILES['base_a']['tmp_name'], "../admin/uploads/" . $base_a);
//campos de mover imagem do aterramento 2
move_uploaded_file($_FILES['base_b']['tmp_name'], "../admin/uploads/" . $base_b);
//campos de mover imagem do aterramento 3
move_uploaded_file($_FILES['base_c']['tmp_name'], "../admin/uploads/" . $base_c);
//campos de mover imagem do aterramento 4
move_uploaded_file($_FILES['base_d']['tmp_name'], "../admin/uploads/" . $base_d);
//campos de mover imagem do aterramento 4
move_uploaded_file($_FILES['gate_grounding']['tmp_name'], "../admin/uploads/" . $gate_grounding);
//campos de mover imagem do aterramento 4
move_uploaded_file($_FILES['lighting_pole_grounding']['tmp_name'], "../admin/uploads/" . $lighting_pole_grounding);
//campos de mover imagem do aterramento 4
move_uploaded_file($_FILES['grounding1']['tmp_name'], "../admin/uploads/" . $grounding1);
//campos de mover imagem do aterramento 4
move_uploaded_file($_FILES['grounding2']['tmp_name'], "../admin/uploads/" . $grounding2);




$cadastro_clientepf = "INSERT INTO grounding(base_a,
	base_b,
	base_c, 
	base_d, 
	gate_grounding, 
	lighting_pole_grounding, 
	grounding1, 
	grounding2, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$base_a',
	'$base_b',
	'$base_c', 
	'$base_d', 
	'$gate_grounding', 
	'$lighting_pole_grounding', 
	'$grounding1', 
	'$grounding2', 
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa dez<br>
			do relatório, informaçoes do Limpeza do site, preencha abaixo!</div>";
	header('Location: ../limpezadosite.php?clientid=' . $client_id);
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
