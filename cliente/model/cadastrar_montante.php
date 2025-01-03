<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de before 1
$amount1 = $_FILES['amount1']['name'];
// medidores de after 1
$amount2 = $_FILES['amount2']['name'];
// medidores de before 1
$amount3 = $_FILES['amount3']['name'];
// medidores de after 1
$amount4 = $_FILES['amount4']['name'];
// medidores de before 1
$ladder = $_FILES['ladder']['name'];
// medidores de after 1
$narrowing= $_FILES['narrowing']['name'];


$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['amount1']['tmp_name'], "../admin/uploads/" . $amount1);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['amount2']['tmp_name'], "../admin/uploads/" . $amount2);
//campos de mover imagem do before 1
move_uploaded_file($_FILES['amount3']['tmp_name'], "../admin/uploads/" . $amount3);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['amount4']['tmp_name'], "../admin/uploads/" . $amount4);
//campos de mover imagem do before 1
move_uploaded_file($_FILES['ladder']['tmp_name'], "../admin/uploads/" . $ladder);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['narrowing']['tmp_name'], "../admin/uploads/" . $narrowing);



$cadastro_basechum = "INSERT INTO amount(amount1,
    amount2,
	amount3,
	amount4,
	ladder,
	narrowing,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$amount1',
    '$amount2', 
	'$amount3', 
	'$amount4', 
	'$ladder', 
	'$narrowing',  
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa treze<br>
			do relatório, informaçoes do Cabos RF, preencha abaixo!</div>";
	header('Location: ../cabosrf.php?clientid=' . $client_id);
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
