<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de energia 1
$good_junction_box1 = $_FILES['good_junction_box1']['name'];
// medidores de energia 2
$good_junction_box2 = $_FILES['good_junction_box2']['name'];
// medidores de energia 3
$junction_box1 = $_FILES['junction_box1']['name'];
// medidores de energia 4
$junction_box2 = $_FILES['junction_box2']['name'];


$diretorio = "admin/uploads/";
//campos de mover imagem do medidor 1
move_uploaded_file($_FILES['good_junction_box1']['tmp_name'], "../admin/uploads/" . $good_junction_box1);
//campos de mover imagem do medidor 2
move_uploaded_file($_FILES['good_junction_box2']['tmp_name'], "../admin/uploads/" . $good_junction_box2);
//campos de mover imagem do medidor 3
move_uploaded_file($_FILES['junction_box1']['tmp_name'], "../admin/uploads/" . $junction_box1);
//campos de mover imagem do medidor 4
move_uploaded_file($_FILES['junction_box2']['tmp_name'], "../admin/uploads/" . $junction_box2);





$cadastro_clientepf = "INSERT INTO junction_box(good_junction_box1,
	good_junction_box2,
	junction_box1, 
	junction_box2, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$good_junction_box1',
	'$good_junction_box2',
	'$junction_box1', 
	'$junction_box2', 
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa nove<br>
			do relatório, informaçoes do Aterramento, preencha abaixo!</div>";
	header('Location: ../aterramento.php?clientid=' . $client_id);
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
