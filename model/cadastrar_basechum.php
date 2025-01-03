<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de before 1
$base_detail = $_FILES['base_detail']['name'];
// medidores de after 1
$base_detail2 = $_FILES['base_detail2']['name'];
// medidores de before 2
$base_detail3 = $_FILES['base_detail3']['name'];
// medidores de after 2
$base_detail4 = $_FILES['base_detail4']['name'];



$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['base_detail']['tmp_name'], "../admin/uploads/" . $base_detail);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['base_detail2']['tmp_name'], "../admin/uploads/" . $base_detail2);
//campos de mover imagem do before 2
move_uploaded_file($_FILES['base_detail3']['tmp_name'], "../admin/uploads/" . $base_detail3);
//campos de mover imagem do after 2
move_uploaded_file($_FILES['base_detail4']['tmp_name'], "../admin/uploads/" . $base_detail4);






$cadastro_basechum = "INSERT INTO ev_bases_and_anchors(base_detail,
    base_detail2,
	base_detail3,
	base_detail4, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$base_detail1',
    '$base_detail2',
	'$base_detail3', 
	'$base_detail4',  
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa onze<br>
			do relatório, informaçoes do Drenos, preencha abaixo!</div>";
	header('Location: ../drenos.php?clientid=' . $client_id);
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
