<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);


// medidores de after 1
$new_construction_nearby = $_FILES['new_construction_nearby']['name'];
// medidores de after 1
$new_construction_nearby2 = $_FILES['new_construction_nearby2']['name'];




$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['new_construction_nearby']['tmp_name'], "../admin/uploads/" . $new_construction_nearby);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['new_construction_nearby2']['tmp_name'], "../admin/uploads/" . $new_construction_nearby2);



$cadastro_basechum = "INSERT INTO nearby_construction_500m(new_construction_nearby,
new_construction_nearby2,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$new_construction_nearby',
	'$new_construction_nearby2',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Dezoito<br>
			do relatório, informaçoes do Equipamentos , preencha abaixo!</div>";
	header('Location: ../equipamentos.php?clientid='. $client_id);
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
