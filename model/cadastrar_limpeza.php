<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de before 1
$before1 = $_FILES['before1']['name'];
// medidores de after 1
$after1 = $_FILES['after1']['name'];
// medidores de before 2
$before2 = $_FILES['before2']['name'];
// medidores de after 2
$after2 = $_FILES['after2']['name'];
// medidores de before 3
$before3 = $_FILES['before3']['name'];
// medidores de after 3
$after3 = $_FILES['after3']['name'];
// medidores de before 4
$before4 = $_FILES['before4']['name'];
// medidores de after 4
$after4 = $_FILES['after4']['name'];
// medidores de before 5
$before5 = $_FILES['before5']['name'];
// medidores de after 5
$after5 = $_FILES['after5']['name'];



// medidores de before 
$garbage_removal = $_FILES['garbage_removal']['name'];
// medidores de after 
$garbage_removal2 = $_FILES['garbage_removal2']['name'];
// medidores de before 
$before6 = $_FILES['before6']['name'];
// medidores de after 
$after6 = $_FILES['after6']['name'];
// medidores de before 7
$before7 = $_FILES['before7']['name'];
// medidores de after 7
$after7 = $_FILES['after7']['name'];
// medidores de before 8
$before8 = $_FILES['before8']['name'];
// medidores de after 8
$after8 = $_FILES['after8']['name'];

// erosão no solo
$soil_erosion = $_POST['soil_erosion'];
// sobra de material
$leftover_material = $_POST['leftover_material'];




$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['before1']['tmp_name'], "../admin/uploads/" . $before1);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['after1']['tmp_name'], "../admin/uploads/" . $after1);
//campos de mover imagem do before 2
move_uploaded_file($_FILES['before2']['tmp_name'], "../admin/uploads/" . $before2);
//campos de mover imagem do after 2
move_uploaded_file($_FILES['after2']['tmp_name'], "../admin/uploads/" . $after2);
//campos de mover imagem do before 3
move_uploaded_file($_FILES['before3']['tmp_name'], "../admin/uploads/" . $before3);
//campos de mover imagem do after 3
move_uploaded_file($_FILES['after3']['tmp_name'], "../admin/uploads/" . $after3);
//campos de mover imagem do before 4
move_uploaded_file($_FILES['before4']['tmp_name'], "../admin/uploads/" . $before4);
//campos de mover imagem do after 4
move_uploaded_file($_FILES['after4']['tmp_name'], "../admin/uploads/" . $after4);
//campos de mover imagem do before 5
move_uploaded_file($_FILES['before5']['tmp_name'], "../admin/uploads/" . $before5);
//campos de mover imagem do after 5
move_uploaded_file($_FILES['after5']['tmp_name'], "../admin/uploads/" . $after5);


//campos de mover imagem do after 6
move_uploaded_file($_FILES['after6']['tmp_name'], "../admin/uploads/" . $after6);
//campos de mover imagem do after 6
move_uploaded_file($_FILES['after6']['tmp_name'], "../admin/uploads/" . $after6);
//campos de mover imagem do after 5
move_uploaded_file($_FILES['after7']['tmp_name'], "../admin/uploads/" . $after7);
//campos de mover imagem do after 5
move_uploaded_file($_FILES['after7']['tmp_name'], "../admin/uploads/" . $after7);
//campos de mover imagem do after 5
move_uploaded_file($_FILES['after8']['tmp_name'], "../admin/uploads/" . $after8);
//campos de mover imagem do after 5
move_uploaded_file($_FILES['after8']['tmp_name'], "../admin/uploads/" . $after8);





$cadastro_limpezainterna = "INSERT INTO internal_site_cleaning(before1,
    after1,
	before2,
	after2,
	before3, 
	after3, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$before1',
    '$after1',
	'$before2',
	'$after2',
	'$before3', 
	'$after3',  
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_lpi = mysqli_query($connect, $cadastro_limpezainterna);

$cadastro_limpezaexterna = "INSERT INTO external_cleaning_site(before4,
    after4,
	before5,
	after5, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$before4',
    '$after4',
	'$before5',
	'$after5',  
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_lpe = mysqli_query($connect, $cadastro_limpezaexterna);

$cadastro_botafora = "INSERT INTO put_it_out(garbage_removal,
garbage_removal2,
	before6,
    after6,
	before7,
	after7, 
	before8, 
	after8, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$garbage_removal',
	'$garbage_removal2',
	'$before6',
    '$after6',
	'$before7',
	'$after7',
	'$before8', 
	'$after8',  
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_btf = mysqli_query($connect, $cadastro_botafora);

if ($cad_lpi) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa Dez<br>
			do relatório, informaçoes do Bases e chumbadores, preencha abaixo!</div>";
	header('Location: ../basesechumbadores.php?clientid=' . $client_id);
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
