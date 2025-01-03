<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// oBSERVAÇÕES 1
$comments = $_FILES['comments']['name'];
// oBSERVAÇÕES 1
$comments2 = $_FILES['comments2']['name'];
// oBSERVAÇÕES 1
$comments3 = $_FILES['comments3']['name'];
// oBSERVAÇÕES 1
$comments4 = $_FILES['comments4']['name'];
// oBSERVAÇÕES 1
$comments5 = $_FILES['comments5']['name'];
// oBSERVAÇÕES 1
$comments6 = $_FILES['comments6']['name'];
// oBSERVAÇÕES 1
$comments7 = $_FILES['comments7']['name'];
// oBSERVAÇÕES 1
$comments8 = $_FILES['comments8']['name'];
// oBSERVAÇÕES 1
$comments9 = $_FILES['comments9']['name'];
// oBSERVAÇÕES 1
$comments10 = $_FILES['comments10']['name'];
// oBSERVAÇÕES 1
$comments11 = $_FILES['comments11']['name'];
// oBSERVAÇÕES 1
$comments12 = $_FILES['comments12']['name'];

//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments']['tmp_name'], "../admin/uploads/" . $comments);
//campos de mover imagem da observações 2
move_uploaded_file($_FILES['comments2']['tmp_name'], "../admin/uploads/" . $comments2);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments3']['tmp_name'], "../admin/uploads/" . $comments3);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments4']['tmp_name'], "../admin/uploads/" . $comments4);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments5']['tmp_name'], "../admin/uploads/" . $comments5);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments6']['tmp_name'], "../admin/uploads/" . $comments6);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments7']['tmp_name'], "../admin/uploads/" . $comments7);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments8']['tmp_name'], "../admin/uploads/" . $comments8);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments9']['tmp_name'], "../admin/uploads/" . $comments9);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments10']['tmp_name'], "../admin/uploads/" . $comments10);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments11']['tmp_name'], "../admin/uploads/" . $comments11);
//campos de mover imagem da observações 1
move_uploaded_file($_FILES['comments12']['tmp_name'], "../admin/uploads/" . $comments12);

$cadastro_clientepf = "INSERT INTO general_observations(comments,
comments2,
comments3,
comments4,
comments5,
comments6,
comments7,
comments8,
comments9,
comments10,
comments11,
comments12,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$comments',
	'$comments2',
	'$comments3',
	'$comments4',
	'$comments5',
	'$comments6',
	'$comments7',
	'$comments8',
	'$comments9',
	'$comments10',
	'$comments11',
	'$comments12',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa oito<br>
			do relatório, informaçoes do Caixa de passagem, preencha abaixo!</div>";
	header('Location: ../notas.php?clientid=' . $client_id);
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
