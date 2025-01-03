<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// site_irregularities 1
$site_irregularities = $_POST['site_irregularities'];
// site_irregularities 1
$site_irregularities2 = $_POST['site_irregularities2'];
// site_irregularities 1
$site_irregularities3 = $_POST['site_irregularities3'];
// site_irregularities 1
$site_irregularities4 = $_POST['site_irregularities4'];
// site_irregularities 1
$site_irregularities5 = $_POST['site_irregularities5'];
// site_irregularities 1
$site_irregularities6 = $_POST['site_irregularities6'];
// site_irregularities 1
$site_irregularities7 = $_POST['site_irregularities7'];
// site_irregularities 1
$site_irregularities8 = $_POST['site_irregularities8'];
// site_irregularities 1
$site_irregularities9 = $_POST['site_irregularities9'];
// site_irregularities 1
$site_irregularities10 = $_POST['site_irregularities10'];
// site_irregularities 1
$site_irregularities11 = $_POST['site_irregularities11'];
// site_irregularities 1
$site_irregularities12 = $_POST['site_irregularities12'];
// site_irregularities 1
$site_irregularities13 = $_POST['site_irregularities13'];
// site_irregularities 1
$site_irregularities14 = $_POST['site_irregularities14'];
// medidores de energia 1
$inside_property = $_POST['inside_property'];
// medidores de energia 1
$phone = $_POST['phone'];
// medidores de energia 1
$email = $_POST['email'];
// comments 1
$comments = $_POST['comments'];
// comments 1
$comments2 = $_POST['comments2'];
// comments 1
$comments3 = $_POST['comments3'];
// comments 1
$comments4 = $_POST['comments4'];
// comments 1
$comments5 = $_POST['comments5'];
// comments 1
$comments6 = $_POST['comments6'];
// comments 1
$comments7 = $_POST['comments7'];
// comments 1
$comments8 = $_POST['comments8'];

$cadastro_clientepf = "INSERT INTO notes(site_irregularities,
site_irregularities2,
site_irregularities3,
site_irregularities4,
site_irregularities5,
site_irregularities6,
site_irregularities7,
site_irregularities8,
site_irregularities9,
site_irregularities10,
site_irregularities11,
site_irregularities12,
site_irregularities13,
site_irregularities14,
inside_property,
comments,
comments2,
comments3,
comments4,
comments5,
comments6,
comments7,
comments8,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$site_irregularities',
	'$site_irregularities2',
	'$site_irregularities3',
	'$site_irregularities4',
	'$site_irregularities5',
	'$site_irregularities6',
	'$site_irregularities7',
	'$site_irregularities8',
	'$site_irregularities9',
	'$site_irregularities10',
	'$site_irregularities11',
	'$site_irregularities12',
	'$site_irregularities13',
	'$site_irregularities14',
	'$inside_property',
	'$comments',
	'$comments2',
	'$comments3',
	'$comments4',
	'$comments5',
	'$comments6',
	'$comments7',
	'$comments8',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Seu relatorio foi finalizado agora você já pode gerar o PDF!</div>";
	header('Location: ../gerarpdf.php?clientid=' . $client_id);
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
