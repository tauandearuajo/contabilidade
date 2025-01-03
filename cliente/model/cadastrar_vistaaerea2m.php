<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);


// medidores de after 1
$zero = $_FILES['zero']['name'];
// medidores de after 1
$sixty = $_FILES['sixty']['name'];
// medidores de after 1
$i_sit_and_come = $_FILES['i_sit_and_come']['name'];
// medidores de after 1
$one_hundred_and_eighty = $_FILES['one_hundred_and_eighty']['name'];
// medidores de after 1
$two_hundred_and_forty = $_FILES['two_hundred_and_forty']['name'];
// medidores de after 1
$three_hundred = $_FILES['three_hundred']['name'];




$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['zero']['tmp_name'], "../admin/uploads/" . $zero);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['sixty']['tmp_name'], "../admin/uploads/" . $sixty);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['i_sit_and_come']['tmp_name'], "../admin/uploads/" . $i_sit_and_come);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['one_hundred_and_eighty']['tmp_name'], "../admin/uploads/" . $one_hundred_and_eighty);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['two_hundred_and_forty']['tmp_name'], "../admin/uploads/" . $two_hundred_and_forty);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['face_d_zoom2']['tmp_name'], "../admin/uploads/" . $three_hundred);


$cadastro_basechum = "INSERT INTO aerial_view_2_meters(zero,
sixty,
i_sit_and_come,
one_hundred_and_eighty,
two_hundred_and_forty,
three_hundred,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$zero',
	'$sixty',
	'$i_sit_and_come',
	'$one_hundred_and_eighty',
	'$two_hundred_and_forty',
	'$three_hundred',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Dezoito<br>
			do relatório, informaçoes do Vista Superior - 2 Metros de altura , preencha abaixo!</div>";
	header('Location: ../vistas2m.php?clientid='. $client_id);
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
