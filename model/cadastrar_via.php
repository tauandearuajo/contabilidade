<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

$gps = $_FILES['gps']['name'];
	$site_facade = $_FILES['site_facade']['name'];
	$onest_street_access = $_FILES['1st_street_access']['name'];
	$twost_street_access = $_FILES['2st_street_access']['name'];
	$identification_plate_ev = $_FILES['identification_plate_ev']['name'];
	$identification_plate_sba = $_FILES['identification_plate_sba']['name'];


	$diretorio = "admin/uploads/";
	move_uploaded_file($_FILES['gps']['tmp_name'], "../admin/uploads/" . $gps);
	move_uploaded_file($_FILES['site_facade']['tmp_name'], "../admin/uploads/" . $site_facade);
	move_uploaded_file($_FILES['1st_street_access']['tmp_name'], "../admin/uploads/" . $onest_street_access);
	move_uploaded_file($_FILES['2st_street_access']['tmp_name'], "../admin/uploads/" . $twost_street_access);
	move_uploaded_file($_FILES['identification_plate_ev']['tmp_name'], "../admin/uploads/" . $identification_plate_ev);
	move_uploaded_file($_FILES['identification_plate_sba']['tmp_name'], "../admin/uploads/" . $identification_plate_sba);
	

	$cadastro_clientepf = "INSERT INTO access_way(gps,
	site_facade,
	1st_street_access, 
	2st_street_access,
	identification_plate_ev,
	identification_plate_sba, 
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$gps',
	'$site_facade',
	'$onest_street_access', 
	'$twost_street_access',
	'$identification_plate_ev',
	'$identification_plate_sba',
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

	$cad_pf = mysqli_query($connect, $cadastro_clientepf);



	if ($cad_pf) {
		

		
			$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa quatro<br>
			do relatório, informaçoes do Cadeado, preencha abaixo!</div>" ;
		header('Location: ../fachadaelaterais.php?clientid='.$client_id);
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

