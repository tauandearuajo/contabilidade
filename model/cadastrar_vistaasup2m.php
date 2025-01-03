<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);


// medidores de after 1
$front = $_FILES['front']['name'];
// medidores de after 1
$right_side = $_FILES['right_side']['name'];
// medidores de after 1
$left_side = $_FILES['left_side']['name'];
// medidores de after 1
$site_background = $_FILES['site_background']['name'];


$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['front']['tmp_name'], "../admin/uploads/" . $front);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['right_side']['tmp_name'], "../admin/uploads/" . $right_side);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['left_side']['tmp_name'], "../admin/uploads/" . $left_side);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['site_background']['tmp_name'], "../admin/uploads/" . $site_background);


$cadastro_basechum = "INSERT INTO top_view_2_meters(front,
right_side,
left_side,
site_background,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$front',
	'$right_side',
	'$left_side',
	'$site_background',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Dezoito<br>
			do relatório, informaçoes do Construção próxima - 500M , preencha abaixo!</div>";
	header('Location: ../consta500m.php?clientid='. $client_id);
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
