<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de before 1
$rf_cables = $_FILES['rf_cables']['name'];
// medidores de after 1
$rf_cables2 = $_FILES['rf_cables2']['name'];
// medidores de before 1
$painted_handle = $_POST['painted_handle'];
// medidores de after 1
$new_rf_cable = $_POST['new_rf_cable'];


$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['rf_cables']['tmp_name'], "../admin/uploads/" . $rf_cables);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['rf_cables2']['tmp_name'], "../admin/uploads/" . $rf_cables2);




$cadastro_basechum = "INSERT INTO rf_cables(rf_cables,
    rf_cables2,
	painted_handle,
	new_rf_cable,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$rf_cables',
	'$rf_cables2',
    '$painted_handle', 
	'$new_rf_cable', 
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Quatorze<br>
			do relatório, informaçoes do Trava Quedas, preencha abaixo!</div>";
	header('Location: ../travaquedas.php?clientid=' . $client_id);
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
