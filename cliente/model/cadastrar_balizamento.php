<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de before 1
$type_of_marking = $_FILES['type_of_markinglock_falls'];
// medidores de after 1
$qcab = $_FILES['qcab']['name'];
// medidores de after 1
$multimeter_test = $_FILES['multimeter_test']['name'];
// medidores de after 1
$conventional_overhead_goal = $_FILES['conventional_overhead_goal']['name'];
// medidores de after 1
$conventional_intermediate_goal = $_FILES['conventional_intermediate_goal']['name'];



$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['qcab']['tmp_name'], "../admin/uploads/" . $qcab);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['multimeter_test']['tmp_name'], "../admin/uploads/" . $multimeter_test);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['conventional_overhead_goal']['tmp_name'], "../admin/uploads/" . $conventional_overhead_goal);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['conventional_intermediate_goal']['tmp_name'], "../admin/uploads/" . $conventional_intermediate_goal);



$cadastro_basechum = "INSERT INTO marking(type_of_marking,
    qcab,
	multimeter_test,
	conventional_overhead_goal,
	conventional_intermediate_goal,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$type_of_marking',
	'$qcab',
    '$multimeter_test', 
	'$conventional_overhead_goal', 
	'$conventional_intermediate_goal',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Dezessete<br>
			do relatório, informaçoes do Iluminação , preencha abaixo!</div>";
	header('Location: ../iluminacao.php?clientid='. $client_id);
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
