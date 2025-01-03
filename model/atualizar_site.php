<?php

session_start();
require_once 'database/conexao.php';


$site_name = mysqli_real_escape_string($connect, $_POST['site_name']);
$city = mysqli_real_escape_string($connect, $_POST['city']);
$siteid = mysqli_real_escape_string($connect, $_POST['siteid']);
$initial_date = mysqli_real_escape_string($connect, $_POST['initial_date']);
$final_date = mysqli_real_escape_string($connect, $_POST['final_date']);
$coordinates = mysqli_real_escape_string($connect, $_POST['coordinates']);
$coordinates2 = mysqli_real_escape_string($connect, $_POST['coordinates2']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);
$overview = mysqli_real_escape_string($connect, $_POST['overview']);

if ($_FILES['overview']['name'] != null || $_FILES['overview']['name'] != "" ) {
	$arquivo = $_FILES['overview']['name'];
	$extensao = strtolower(substr($_FILES['overview']['name'], -4));

	$novo_nome = uniqid();
	$novo_arquivo = $novo_nome . $extensao;

	//$diretorio = "admin/uploads/";
	$overview = $novo_arquivo;
	move_uploaded_file($_FILES['overview']['tmp_name'], "../uploads/" . $novo_arquivo);
	$update_site = "UPDATE site set site_name = '$site_name',
	city = '$city',
	siteid = '$siteid',
	initial_date = '$initial_date',
	final_date = '$final_date',
	coordinates = '$coordinates',
	coordinates2 = '$coordinates2',
	overview = '$overview',
	updated_at = now() ";

	$up_site = mysqli_query($connect, $update_site);



	if ($up_site) {
		

			$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa dois<br>
			do relatório, informaçoes do Cadeado, preencha abaixo!</div>" ;


		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
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
}else{

	$update_site = "UPDATE site set site_name = '$site_name',
	city = '$city',
	siteid = '$siteid',
	initial_date = '$initial_date',
	final_date = '$final_date',
	coordinates = '$coordinates',
	coordinates2 = '$coordinates2',
	overview = '$overview',
	updated_at = now()";

	$up_site = mysqli_query($connect, $update_site);



	if ($up_site) {
		



		header('Location: ../detalhes_relatorio.php?reportid='.$report_id);
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

}
