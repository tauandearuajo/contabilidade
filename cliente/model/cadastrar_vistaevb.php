<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);


// medidores de after 1
$face_b = $_FILES['face_b']['name'];
// medidores de after 1
$face_b2 = $_FILES['face_b2']['name'];
// medidores de after 1
$face_b_zoom = $_POST['face_b_zoom'];
// medidores de after 1
$face_b_zoom2 = $_POST['face_b_zoom2'];



$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['face_b']['tmp_name'], "../admin/uploads/" . $face_b);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['face_b']['tmp_name'], "../admin/uploads/" . $face_b2);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['face_b_zoom ']['tmp_name'], "../admin/uploads/" . $face_b_zoom );
//campos de mover imagem do after 1
move_uploaded_file($_FILES['face_b_zoom2']['tmp_name'], "../admin/uploads/" . $face_b_zoom2);


$cadastro_basechum = "INSERT INTO view_and_face_b(face_b,
face_b2,
face_b_zoom,
face_b_zoom2,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$face_a',
	'$face_a2',
	'$face_a_zoom',
    '$face_a_zoom2', 
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Dezoito<br>
			do relatório, informaçoes do Vista da EV - Face C , preencha abaixo!</div>";
	header('Location: ../vistaevc.php?clientid='. $client_id);
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
