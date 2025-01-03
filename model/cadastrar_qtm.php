<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de energia 1
$qtm = $_FILES['qtm']['name'];
// medidores de energia 2
$qtm2 = $_FILES['qtm2']['name'];
// medidores de energia 3
$qtm3 = $_FILES['qtm3']['name'];
// medidores de energia 4
$qtm4 = $_FILES['qtm4']['name'];
// medidores de energia 5
$qtm5 = $_FILES['qtm5']['name'];
// medidores de energia 6
$qtm6 = $_FILES['qtm6']['name'];
// medidores de energia 7
$qtm7 = $_FILES['qtm7']['name'];
// medidores de energia 8
$qtm8 = $_FILES['qtm8']['name'];



$diretorio = "admin/uploads/";
//campos de mover imagem do medidor 1
move_uploaded_file($_FILES['qtm']['tmp_name'], "../admin/uploads/" . $qtm);
//campos de mover imagem do medidor 2
move_uploaded_file($_FILES['qtm2']['tmp_name'], "../admin/uploads/" . $qtm2);
//campos de mover imagem do medidor 3
move_uploaded_file($_FILES['qtm3']['tmp_name'], "../admin/uploads/" . $qtm3);
//campos de mover imagem do medidor 4
move_uploaded_file($_FILES['qtm4']['tmp_name'], "../admin/uploads/" . $qtm4);
//campos de mover imagem do medidor 5
move_uploaded_file($_FILES['qtm5']['tmp_name'], "../admin/uploads/" . $qtm5);
//campos de mover imagem do medidor 6
move_uploaded_file($_FILES['qtm6']['tmp_name'], "../admin/uploads/" . $qtm6);
//campos de mover imagem do medidor 7
move_uploaded_file($_FILES['qtm7']['tmp_name'], "../admin/uploads/" . $qtm7);
//campos de mover imagem do medidor 8
move_uploaded_file($_FILES['qtm8']['tmp_name'], "../admin/uploads/" . $qtm8);




$cadastro_clientepf = "INSERT INTO qtm_frame(qtm,
	qtm2,
	qtm3, 
	qtm4, 
	qtm5, 
	qtm6, 
	qtm7, 
	qtm8,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$qtm',
	'$qtm2',
	'$qtm3', 
	'$qtm4', 
	'$qtm5', 
	'$qtm6', 
	'$qtm7', 
	'$qtm8',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa oito<br>
			do relatório, informaçoes do Caixa de passagem, preencha abaixo!</div>";
	header('Location: ../caixadepassagem.php?clientid=' . $client_id);
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
