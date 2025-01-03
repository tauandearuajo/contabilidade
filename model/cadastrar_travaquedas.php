<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de before 1
$lock_falls = $_FILES['lock_falls']['name'];
// medidores de after 1
$lock_falls2 = $_FILES['lock_falls2']['name'];
// medidores de after 1
$lock_falls3 = $_FILES['lock_falls3']['name'];
// medidores de after 1
$lock_falls4 = $_FILES['lock_falls4']['name'];


$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['lock_falls']['tmp_name'], "../admin/uploads/" . $lock_falls);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['lock_falls2']['tmp_name'], "../admin/uploads/" . $lock_falls2);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['lock_falls3']['tmp_name'], "../admin/uploads/" . $lock_falls3);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['lock_falls4']['tmp_name'], "../admin/uploads/" . $lock_falls4);



$cadastro_basechum = "INSERT INTO lock_falls(lock_falls,
    lock_falls2,
	lock_falls3,
	lock_falls4,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$lock_falls',
	'$lock_falls2',
    '$lock_falls3', 
	'$lock_falls4', 
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Quinze<br>
			do relatório, informaçoes do Balizamento, preencha abaixo!</div>";
	header('Location: ../balizamento.php?clientid='. $client_id);
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
