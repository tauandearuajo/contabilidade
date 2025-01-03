<?php

session_start();
require_once 'database/conexao.php';

date_default_timezone_set('America/Sao_Paulo');

$business_id = mysqli_real_escape_string($connect, $_POST['business_id']);
$corporate_reason = mysqli_real_escape_string($connect, $_POST['corporate_reason']);
$fantasy_name = mysqli_real_escape_string($connect, $_POST['fantasy_name']);
$cnpj = mysqli_real_escape_string($connect, $_POST['cnpj']);
$updated_at = date('d-m-y');

	$up_business = "UPDATE business SET corporate_reason='$corporate_reason',fantasy_name='$fantasy_name',cnpj='$cnpj',updated_at='$updated_at' where id='$business_id' ";

	$atualizar_bus = mysqli_query($connect, $up_business);


	if ($atualizar_bus) {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Cadastrado com Sucesso.\");
				</script>
			";*/



		header('Location: ../business.php?sucesso');
	} else {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	*/
		echo mysqli_error($connect);
	}

