<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de energia 1
$tenant1 = $_POST['tenant1'];
$meter1 = $_POST['meter1'];
$meter_reading1 = $_POST['meter_reading1'];
$meter_photo1 = $_FILES['meter_photo1']['name'];
$reading_photo1 = $_FILES['reading_photo1']['name'];
// medidores de energia 2
$tenant2 = $_POST['tenant2'];
$meter2 = $_POST['meter2'];
$meter_reading2 = $_POST['meter_reading2'];
$meter_photo2 = $_FILES['meter_photo2']['name'];
$reading_photo2 = $_FILES['reading_photo2']['name'];
// medidores de energia 3
$tenant3 = $_POST['tenant3'];
$meter3 = $_POST['meter3'];
$meter_reading3 = $_POST['meter_reading3'];
$meter_photo3 = $_FILES['meter_photo3']['name'];
$reading_photo3 = $_FILES['reading_photo3']['name'];
// medidores de energia 4
$tenant4 = $_POST['tenant4'];
$meter4 = $_POST['meter4'];
$meter_reading4 = $_POST['meter_reading4'];
$meter_photo4 = $_FILES['meter_photo4']['name'];
$reading_photo4 = $_FILES['reading_photo4']['name'];



$diretorio = "admin/uploads/";
//campos de mover imagem do medidor 1
move_uploaded_file($_FILES['meter_photo1']['tmp_name'], "../admin/uploads/" . $meter_photo1);
move_uploaded_file($_FILES['reading_photo1']['tmp_name'], "../admin/uploads/" . $reading_photo1);
//campos de mover imagem do medidor 2
move_uploaded_file($_FILES['meter_photo2']['tmp_name'], "../admin/uploads/" . $meter_photo2);
move_uploaded_file($_FILES['reading_photo2']['tmp_name'], "../admin/uploads/" . $reading_photo2);
//campos de mover imagem do medidor 3
move_uploaded_file($_FILES['meter_photo3']['tmp_name'], "../admin/uploads/" . $meter_photo3);
move_uploaded_file($_FILES['reading_photo3']['tmp_name'], "../admin/uploads/" . $reading_photo3);
//campos de mover imagem do medidor 4
move_uploaded_file($_FILES['meter_photo4']['tmp_name'], "../admin/uploads/" . $meter_photo4);
move_uploaded_file($_FILES['reading_photo4']['tmp_name'], "../admin/uploads/" . $reading_photo4);


$cadastro_clientepf = "INSERT INTO energy_meters(tenant1,
	meter1,
	meter_reading1, 
	meter_photo1,
	reading_photo1,
	tenant2,
	meter2,
	meter_reading2, 
	meter_photo2,
	reading_photo2,
	tenant3,
	meter3,
	meter_reading3, 
	meter_photo3,
	reading_photo3,
	tenant4,
	meter4,
	meter_reading4, 
	meter_photo4,
	reading_photo4, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$tenant1',
	'$meter1',
	'$meter_reading1', 
	'$meter_photo1',
	'$reading_photo1',
	'$tenant2',
	'$meter2',
	'$meter_reading2', 
	'$meter_photo2',
	'$reading_photo2',
	'$tenant3',
	'$meter3',
	'$meter_reading3', 
	'$meter_photo3',
	'$reading_photo3',
	'$tenant4',
	'$meter4',
	'$meter_reading4', 
	'$meter_photo4',
	'$reading_photo4',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa sete<br>
			do relatório, informaçoes do Quadro QTM, preencha abaixo!</div>";
	header('Location: ../quadroqtm.php?clientid=' . $client_id);
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
